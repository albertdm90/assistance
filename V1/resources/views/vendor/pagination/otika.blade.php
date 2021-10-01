<div class="text-right">
	@if ($paginator->hasPages())
			<nav>
				

					<div>
							<div>
									<small class="text-sm text-gray-700 leading-5">
											<span>{!! __('Mostrando') !!}</span>
											<span class="font-medium">{{ $paginator->firstItem() }}</span>
											<span>{!! __('a') !!}</span>
											<span class="font-medium">{{ $paginator->lastItem() }}</span>
											<span>{!! __('de') !!}</span>
											<span class="font-medium">{{ $paginator->total() }}</span>
											<span>{!! __('resultados') !!}</span>
									</small>
							</div>

							<div>
									<span class="relative z-0 inline-flex shadow-sm">
											<span>
													{{-- Previous Page Link --}}
													@if ($paginator->onFirstPage())
															<span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
																	<span class="btn btn-sm btn-light" aria-hidden="true">
																			<i class="fa fa-arrow-left"></i>
																	</span>
															</span>
													@else
															<button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="btn btn-sm btn-primary" aria-label="{{ __('pagination.previous') }}">
																<i class="fa fa-arrow-left"></i>
															</button>
													@endif
											</span>

											{{-- Pagination Elements --}}
											@foreach ($elements as $element)
													{{-- "Three Dots" Separator --}}
													@if (is_string($element))
															<span aria-disabled="true">
																	{{-- <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span> --}}
															</span>
													@endif

													{{-- Array Of Links --}}
													@if (is_array($element))
															@foreach ($element as $page => $url)
																	<span wire:key="paginator-page{{ $page }}">
																			@if ($page == $paginator->currentPage())
																					<span aria-current="page">
																							<span class="btn btn-sm btn-success">{{ $page }}</span>
																					</span>
																			@else
																					<button wire:click="gotoPage({{ $page }})" class="btn btn-sm btn-light" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
																							{{ $page }}
																					</button>
																			@endif
																	</span>
															@endforeach
													@endif
											@endforeach

											<span>
													{{-- Next Page Link --}}
													@if ($paginator->hasMorePages())
															<button wire:click="nextPage" dusk="nextPage.after" rel="next" class="btn btn-sm btn-primary" aria-label="{{ __('pagination.next') }}">
																	<i class="fa fa-arrow-right"></i>
															</button>
													@else
															<span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
																	<span class="btn btn-sm btn-light" aria-hidden="true">
																		<i class="fa fa-arrow-right"></i>
																	</span>
															</span>
													@endif
											</span>
									</span>
							</div>
					</div>
			</nav>
	@endif
</div>
