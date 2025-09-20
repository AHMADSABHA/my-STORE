<div class="rounded position-relative fruite-item">
    <div class="fruite-img" style="height:220px; display:flex; align-items:center; justify-content:center; overflow:hidden; background:#f8f9fa;">
        <a href="{{ route('products.details', $item->id) }}" style="display:block; width:100%; height:100%;">
            <img src="{{ asset($item->image) }}" alt="" style="max-width:100%; max-height:200px; width:auto; height:auto; display:block; margin:auto; object-fit:contain;">
        </a>
    </div>
    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
        {{ $item->category ? $item->category->name : 'بدون قسم' }}
    </div>
    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
        <h4>{{ $item->name }}</h4>
        <p>{{ $item->description }}</p>
        <div class="d-flex justify-content-between flex-lg-wrap">
            <p class="text-dark fs-5 fw-bold mb-0">{{ $item->price }}$</p>
            <p class="text-dark fs-5 fw-bold mb-0">{{ $item->delivery_time }}يوم</p>
            <form action="{{ route('cart.add') }}" method="POST" class="d-inline-flex align-items-center">
                @csrf
                <input type="hidden" name="product_id" value="{{ $item->id }}">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="this.parentNode.nextElementSibling.stepDown(); ">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="number" name="quantity" value="1" min="1" class="form-control d-inline mx-2" style="width:60px;">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="this.parentNode.previousElementSibling.stepUp(); ">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                    <i class="fa fa-shopping-bag me-2 text-primary"></i> اضافة الى السلة
                </button>
            </form>
        </div>
    </div>
</div>
