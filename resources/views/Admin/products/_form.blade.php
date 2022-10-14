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
        <label>{{ __('site.English Name') }}</label>
        <input type="text" placeholder="{{ __('site.Enter English Name') }}" name="name_en" class="form-control" value="{{ $product->name_en }}" />
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label>{{ __('site.Arabic Name') }}</label>
        <input type="text" placeholder="{{ __('site.Enter Arabic Name') }}" name="name_ar" class="form-control" value="{{ $product->name_ar}}"/>
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label>{{ __('site.French Name') }}</label>
        <input type="text" name="name_fr" placeholder="{{ __('site.Enter French Name') }}" class="form-control " value="{{ $product->name_fr}}" />
    </div>
</div>

</div>
<div class="mb-3">
    <label for="image">{{ __('site.Enter Image') }}</label>
    <input id="image" type="file" name="image" class="form-control" />
    @if ($product->image)
    <img width="80" src="{{ asset('uploads/products/'. $product->image) }}" alt="">
    @endif

</div>
<div class="mb-3">
    <label>{{ __('site.Album') }}</label>
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
    <label>{{ __('site.English Content') }}</label>
    <textarea placeholder="{{ __('site.Enter English Content') }}" name="content_en" class="myeditor" value="{{ $product->content_en}}" ></textarea>
</div>
<div class="mb-3">
    <label>{{ __('site.Arabic Content') }}</label>
    <textarea placeholder="{{ __('site.Enter Arabic Content') }}" name="content_ar" class="myeditor" value="{{ $product->content_ar}}"></textarea>
</div>

<div class="mb-3">
    <label>{{ __('site.French Content') }}</label>
    <textarea placeholder="{{ __('site.Enter French Content') }}" name="content_fr" class="myeditor" value="{{ $product->content_fr}}"></textarea>
</div>

<div class="row">
<div class="col-md-4">
    <div class="mb-3">
        <label>{{ __('site.Price') }}</label>
        <input type="text" placeholder="{{ __('site.Price') }}" name="price" class="form-control" value="{{ $product->price}}" />
    </div>
</div>
<div class="col-md-4">
    <div class="mb-3">
        <label>{{ __('site.Sale Price') }}%</label>
        <input type="text" placeholder="{{ __('site.Sale Price') }}" name="sale_price" class="form-control" value="{{ $product->sale_price}}"/>
    </div>
</div>

<div class="col-md-4">
    <div class="mb-3">
        <label>{{ __('site.Quantity') }}</label>
        <input type="text" placeholder="{{ __('site.Quantity') }}" name="quantity" class="form-control" value="{{ $product->quantity}}" />
    </div>
</div>
</div>
<div class="mb-3">
    <label>{{ __('site.Category') }}</label>
    <select name="category_id" class="form-control">
       <option value="">{{ __('site.Select') }}</option>
       @foreach ($categories as $item )
        <option @selected($product->category_id == $item->id) value="{{ $item->id }}
            ">{{ $item->trans_name }}</option>
        @endforeach
    </select>
</div>
