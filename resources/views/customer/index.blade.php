<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.header.header')
</head>
<body >

<div class="wrap-" style="max-width: 100%;">   
<div  id="header">  
  <div class="header"> 
      <div class="">
        @include('customer.components.subheader_one') 
        @include('customer.components.subheader_two') 
        <div class="main-contents">
        @include('customer.components.category_banner')  
        @include('customer.components.product_home')  
      </div>
    </div>
  </div>
</div>



</div> 
</body> 
@include('customer.footer.footer')
</html>