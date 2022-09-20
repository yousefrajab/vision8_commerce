@section('styles')
<style>
.album{
    display: flex;
    margin-top: 20px;
}
.album-item{
    margin: 0 10px ;
    position: relative;
}
    .album-item img{
        width:80px ;
        height: 60px;
        object-fit: cover;
    }
    .album-item a{
       position: absolute;
       right: 5px;
       top: 5px;
       width: 15px;
       height: 15px;
       background: #f00;
       border-radius: 50%;
       color: #fff;
       font-size: 9px;
       display: flex;
       justify-content: center;
       align-items: center;
       text-decoration:none;
       transition: all .3s ease;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.23);
    }

    .album-item a:hover{
background:#333;
    }

</style>
@stop
<div class="row">
    <div class="col-md-6">
    <div class="mb-3">
        <label>English Name</label>
        <input type="text" placeholder="English Name" name="name_en" class="form-control" value="{{ $product->name_en }}" />
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label>Arabic Name</label>
        <input type="text" placeholder="Arabic Name" name="name_ar" class="form-control" value="{{ $product->name_ar}}"/>
    </div>
</div>
</div>
<div class="mb-3">
    <label for="image">Image</label>
    <input id="image" type="file" name="image" class="form-control" />
    @if ($product->image)
    <img width="80" src="{{ asset('uploads/products/'. $product->image) }}" alt="">
    @endif

</div>
<div class="mb-3">
    <label>Album</label>
    <input type="file" name="album[]" multiple class="form-control" />
    <div class="album">
        @foreach($product->album as $img)
    <div class="album-item">
        <a href="{{ route('admin.products.delete_image',$img->id) }}"><i class="fas fa-times"></i></a>
    <img width="70" src="{{ asset('uploads/products/'. $img->path) }}" alt="">
    </div>
    @endforeach
    </div>
</div>
{{-- //multiple => حتى يختار اكثر من صورة لمن اضغط كوترل --}}

<div class="mb-3">
    <label>English Content</label>
    <textarea placeholder="English Content" name="content_en" class="myeditor" value="{{ $product->content_en}}" ></textarea>
</div>
<div class="mb-3">
    <label>Arabic Content</label>
    <textarea placeholder="Arabic Content" name="content_ar" class="myeditor" value="{{ $product->content_ar}}"></textarea>
</div>

<div class="row">
<div class="col-md-4">
    <div class="mb-3">
        <label>Price</label>
        <input type="text" placeholder="Price" name="price" class="form-control" value="{{ $product->price}}" />
    </div>
</div>
<div class="col-md-4">
    <div class="mb-3">
        <label>Sale Price</label>
        <input type="text" placeholder="Sale Price" name="sale_price" class="form-control" value="{{ $product->sale_price}}"/>
    </div>
</div>

<div class="col-md-4">
    <div class="mb-3">
        <label>Quantity</label>
        <input type="text" placeholder="Quantity" name="quantity" class="form-control" value="{{ $product->quantity}}" />
    </div>
</div>
</div>
<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control">
       <option value="">Select</option>
       @foreach ($categories as $item )
        <option @selected($product->category_id == $item->id) value="{{ $item->id }}
            ">{{ $item->trans_name }}</option>
        @endforeach
    </select>
</div>
