@extends('backend.index')

@section('title')
    Chỉnh sửa chính sách
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light"><a href="{{route('faq.index')}}" class="tab-back">Chính sách / </a></span> Chỉnh sửa</h4>
    <!-- Bordered Table -->
    <form action="/admin/faq/{{$faq->faq_id}}" method="post">
        @csrf {{method_field('PUT')}}
        <input type="hidden" name="id" value="{{$faq->faq_id}}">
        <div class="card mb-4 card-border-top">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-3 d-flex align-items-center">
                        <h5 class="fs-4 text-primary my-0">Quản lý các chính sách</h5>
                    </div>
                    <div class="col-lg-6 mb-3 d-flex justify-content-end gap-3">
                        <button type="submit" class="btn btn-success px-5">Lưu</button>
                        <button type="reset" class="btn btn-primary px-5">Làm lại</button>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="image-product" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="name" onkeyup="ChangeToSlug()" id="title" value="{{$faq->faq_name}}"/>
                        @if ($errors->has("name")) 
                            @foreach ($errors->get("name") as $error) 
                                <small class="text-danger fst-italic">
                                    {{ $error }}
                                </small> 
                            @endforeach               
                        @endif
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="path" class="form-label">Đường dẫn</label>
                        <input type="text" class="form-control" name="slug" id="path" readonly value="{{$faq->faq_slug}}"/>
                        @if ($errors->has("slug")) 
                            @foreach ($errors->get("slug") as $error) 
                                <small class="text-danger fst-italic">
                                    {{ $error }}
                                </small> 
                            @endforeach               
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="title" class="form-label">Người chỉnh sửa</label>
                        <input type="text" class="form-control" name="editor" value="{{Auth::user()->name}}" readonly/>
                    </div>   
                    <div class="col-lg-3 mb-3">
                        <label for="title" class="form-label">Hiển thị</label><br>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="radio" value="1" id="defaultCheck3" {{$faq->faq_hidden == 1 ? "checked":""}} />
                                <label class="form-check-label" for="defaultCheck3"> Hiện </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="radio" value="0" id="defaultCheck4" {{$faq->faq_hidden == 0 ? "checked":""}}/>
                                <label class="form-check-label" for="defaultCheck4"> Ẩn </label>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="faq-des" class="form-label">Mô tả</label>
                        <textarea name="faq-des" id="faq-des" cols="" rows="5" class="form-control">{{$faq->faq_description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="content-faq" name="content" rows="10" cols="5">{{$faq->faq_content}}</textarea>
                        @if ($errors->has("content")) 
                            @foreach ($errors->get("content") as $error) 
                                <small class="text-danger fst-italic">
                                    {{ $error }}
                                </small> 
                            @endforeach               
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header card-border-top">
                Nội dung SEO
            </div>
            <hr class="m-0">
            <div class="card-body">
                <div class="mb-3">
                    <label for="seo-keywords" class="form-label">SEO Keywords (vi):</label>
                    <input type="text" name="key" class="form-control" id="seo-keywords" value="{{$faq->faq_metaKeywords}}" placeholder="SEO Keywords (vi)&#58;" />
                </div>
                <div class="mb-3">
                    <label for="seo-description" class="form-label">SEO Description (vi):</label>
                    <textarea class="form-control" name="des" id="seo-description" rows="6" placeholder="SEO Description (vi)&#58;">{{$faq->faq_metaDescription}}</textarea>
                </div>
            </div>
        </div>
    </form>
@endsection
