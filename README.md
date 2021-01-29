# API ENDPOINTS

* GET: api/products<br>
  parameters: id*<br>
  description: Return products.

* GET: api/product<br>
  parameters: id*<br>
  description: Return product

* POST: api/create-product<br>
  parameters:<br>
  name*<br>
  description*<br>
  options * array. fields: s, m, l  
  description: Create new  product.

* POST: api/edit-product<br>
  parameters:<br>
  id*<br>
  name<br>
  description<br>
  options array. fields:s, m, l
  description: Update  product.
  
 * POST: api/buy-product<br>
   parameters:<br>
   id*<br>
   options * array. fields:s, m, l

* DELETE: api/delete-product<br>
  parametrs:<br>
  id*<br>
  description: Delete  product.




