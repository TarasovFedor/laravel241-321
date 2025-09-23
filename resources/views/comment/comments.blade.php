<br> <hr> <br>
<form action="{{ route('save_comment', $article->id) }}" method="POST">
  @CSRF
  <label for="text" class="form-label">Leave a comment:</label>
  <div style="margin: 10px 0; display: flex; flex-direction: row; gap: 10px">
    <input type="text" class="form-control" id="text" name="text">
    <button type="submit" class="btn btn-outline-primary me-3">Save</button>
  </div>
</form>

@if($comments -> isEmpty())
    <p>It's so lonely here...</p>
@else
    <ul>
        @foreach($comments as $comment)
          <div class="card mb-3">
            <div class="card-body">
              <li class="card-text">{{$comment -> text}}</li>
            </div>
          </div>
        @endforeach
    </ul>
@endif