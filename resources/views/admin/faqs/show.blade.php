@extends('admin.layouts.app')

@section('content')
<!-- begin row -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="card-title">{{ $item->answer_en }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route($route.'-admin-update', ['locale' => app()->getLocale(), 'currency' => 'amd', 'id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Question -->
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" class="form-control mb-2" name="question_en" max="255" min="1" placeholder="English" value="{{ $item->question_en }}" required>
                        <input type="text" class="form-control mb-2" name="question_ru" max="255" min="1" placeholder="Русский" value="{{ $item->question_ru }}" required>
                        <input type="text" class="form-control mb-2" name="question_hy" max="255" min="1" placeholder="Հայերեն" value="{{ $item->question_hy }}" required>
                    </div>   
                    
                    <!-- Answer -->
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea rows="3" class="form-control mb-2" name="answer_en" min="1" placeholder="English" required>{{ $item->answer_en }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="answer_ru" min="1" placeholder="Русский" required>{{ $item->answer_ru }}</textarea>
                        <textarea rows="3" class="form-control mb-2" name="answer_hy" min="1" placeholder="Հայերեն" required>{{ $item->answer_hy }}</textarea>
                    </div>

                    <!-- Position ID -->
                    <div class="form-group">
                        <label>Position ID</label>
                        <input type="number" class="form-control mb-2" name="position_id" max="255" min="1" placeholder="Position ID" value="{{ $item->position_id }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection