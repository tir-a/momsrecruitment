@if($vacancies->isNotEmpty())
    @foreach ($vacancies as $vacancy)
        <div class="post-list">
            <p>{{ $vacancy->position }}</p>
            <img src="{{ $vacancy->position }}">
        </div>
    @endforeach
@else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif