<?php


namespace App\Sevices;


use App\Models\Option;
use App\Models\Product;
use App\Repositories\Option\IOptionRepository;
use App\Repositories\Product\IProductRepository;

class ProductService
{
    private $product;
    private $option;

    public function __construct(IProductRepository $product, IOptionRepository $option)
    {
        $this->product = $product;
        $this->option = $option;
    }

    public function create(array $data)
    {
        $validOptionsData = array_intersect_key($data['options'], array_flip($this->option->getFillable()));
        $option = $this->option->create($validOptionsData);
        $data['options_id'] = $option->id;
        return $this->product->create($data);


    }

    public function getById($id)
    {

            return $this->product->getFirstBy('id', $id, ['option']);


    }

    public function getAll()
    {

        return $this->product->getALlWithRelation(['option']);

    }

    public function edit(array $data)
    {


        $product = $this->product->find($data['id']);
        if (isset($data['options'])) {
            $product->option()->update($data['options']);
            unset($data['options']);
            unset($data['id']);
        }

        $product->update($data);



    }

    public function buy(array $data)
    {

        $product = $this->product->getFirstBy('id', $data['id'], ['option']);
        $validData = array_intersect_key($data['options'], array_flip($this->option->getFillable()));
        $successChangedOption = [];
        $noSuccessChangedOption = [];
        foreach ($validData as $key => $item) {
            if ($product['option'][$key] >= $item) {
                $successChangedOption[$key] = $product['option'][$key] - $item;
            } else {

                $noSuccessChangedOption[$key] = $product['option'][$key];
            }
        }

        if (!empty($noSuccessChangedOption)) {
            return ['success' => false, 'errors' => $noSuccessChangedOption];
        }

        $product->option()->update($successChangedOption);
        return ['success' => true];

    }

    public function destroy(int $id)
    {

        $product = $this->product->find($id);
        $product->delete();


    }


}
