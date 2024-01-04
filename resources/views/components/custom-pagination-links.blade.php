<div>
  @if ($paginator->hasPages())
    <div class="join">
      @if ($paginator->onFirstPage())
      <button class="join-item btn btn-disabled">«</button>
      @else
      <button class="join-item btn" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">«</button>
      @endif
      <button class="join-item btn">{{$paginator->currentPage()}}</button>
      @if ($paginator->onLastPage())
      <button class="join-item btn btn-disabled">»</button>
      @else
      <button class="join-item btn" wire:click="nextPage" wire:loading.attr="disabled" rel="next">»</button>
      @endif
    </div>
  @endif
</div>