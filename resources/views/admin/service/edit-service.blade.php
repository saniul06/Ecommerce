@extends('admin.admin-master')

@section('service')
    active show-sub
@endsection

@section('manage-service')
    active
@endsection

@section('admin-content')
    <div class="card pd-20 pd-sm-40">
        @if (Session::has('success'))
            <script>
                window.onload = function() {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Service added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            </script>
        @endif
        <h6 class="card-body-title">Update service</h6>
        <form action="{{ route('service.update', [$service->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Service title: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ $service->service_name }}"
                                placeholder="Enter service title">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Chose category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose category" name='cat_id'>
                                <option label="Choose category" disabled></option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $service->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cat_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Service code <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="code" value="{{ $service->service_code }}"
                                placeholder="Enter code">
                            @error('code')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Price (hourly): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="price" value="{{ $service->price }}"
                                placeholder="Enter price">
                            @error('price')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                            <textarea name="short_desc" id="short_desc"
                                name="short_desc">{{ $service->short_desc }}</textarea>
                            @error('short_desc')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                            <textarea name="long_desc" id="long_desc">{{ $service->long_desc }}</textarea>
                            @error('long_desc')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Thumbnail image <span class="tx-danger">*</span></label>
                            @php
                            $i = App\Multiimage::where('service_id', $service->id)->latest()->get();
                            @endphp
                            @foreach ($i as $image)
                                <div>
                                    <img src="{{ asset('public/frontend/img/service/multi') }}/{{ $image->img }} " alt=""
                                        style="width:120px;height:120px">
                                    <input type="hidden" name="prev_img[]" value={{ $image->img }}>
                                    <div><a class="btn btn-danger"
                                            href="{{ route('image.delete', [$image->img, $service->id]) }}">Delete</a></div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Thumbnail image <span class="tx-danger">*</span></label>
                            <input type="file" name="img[]" id="" multiple>

                        </div>
                        @error('img')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        @if (Session::has('img_error'))
                                <strong class="text-danger">{{ session('img_error') }}</strong>
                                @endif
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" id='btn-submit' type="submit">Update Service</button>
                    <a href={{ route('service.manage') }} class="btn btn-secondary">Back</a>
                </div><!-- form-layout-footer -->

            </div><!-- form-layout -->
        </form>
    </div>
@endsection
