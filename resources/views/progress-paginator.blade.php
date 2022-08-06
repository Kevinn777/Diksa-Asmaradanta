<div class="progress-bar">
    <div class="progress">
        <div class="progress-active" style="width: {{ ($paginator->currentPage() / $paginator->lastPage()) * 100}}%"></div>
    </div>
    <p>{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</p>
</div>