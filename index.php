<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@next"></script>

    <title>FScode Plugin </title>
</head>
<body>

<div id="app">
   <div class="container">
       <div class="row" >
           <form id="myForm" class="m-3 p-5">
               <div class="col-md-4">
                   <div class="alert alert-danger print-error-msg" style="display:none">
                       <ul></ul>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="mb-3">
                       <label for="selectPlugin" class="form-label">Please select one</label>
                       <select v-model="selected" name="class" id="selectPlugin" class="form-select" @change="onChange">
                           <option disabled selected value="">Select</option>
                           <option v-for="plugin in plugins" :value="plugin">{{ plugin }}</option>
                       </select>
                   </div>
               </div>
               <div id="plugin_wrap">

               </div>
           </form>
       </div>
   </div>
</div>

<script src="/public/assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/public/assets/js/app.js"></script>
</body>
</html>
