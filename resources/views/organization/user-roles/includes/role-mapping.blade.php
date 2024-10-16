<style type="text/css">
    #departmentlist {
        width: auto !important;
    }
</style>

<div class="row">

    <div class="col dataTables_wrapper" id="permissions">

        <div class="mb-2"><b>Permissions</b></div>


        <div class="col-12 heading">
            <div class="row">
                <div class="col-12 col-md-6 title"><b>MODULES</b></div>
                <div class="col-4 col-md-2 title citems"><span class="d-block radiospan"><input type="checkbox" id="view-all"
                            class="mr-1">View</span></div>
                <div class="col-4 col-md-2 title citems"><span class="d-block radiospan"><input type="checkbox" id="edit-all"
                            class="mr-1">Edit</span></div>
                <div class="col-4 col-md-2 title citems"><span class="d-block radiospan"><input type="checkbox" id="delete-all"
                            class="mr-1">Delete</span></div>
            </div>
        </div>

        @if (isset($userrole))
            <input type="hidden" name="module_changed" id="module_changed" value="0">
        @endif

        @if ($modules && count($modules) > 0)
            @foreach ($modules as $row)
                @php
                    $pt = $row['parent'];
                    $child = $row['child'];
                @endphp
                @if (isset($userrole))

                    @php
                        $trows = DB::table('org_usr_role_action')
                            ->where('usr_role_id', $userrole->id)
                            ->where('module_id', $pt['id'])
                            ->where('is_deleted', 0)
                            ->where('is_active', 1)
                            ->first();
                    @endphp


                @endif
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6 title"><b>{{ $pt['name'] }}</b></div>
                        <div class="col-4 col-md-2 title citems">

                            <div class="switch viewbox m-0">
                                <input class='switch-input status-btn ser_status'
                                    name="modules[{{ $pt['id'] }}]['view']" data-selid="{{ $pt['id'] }}"
                                    id="view-{{ $pt['id'] }}" value="1" type="checkbox"
                                    @if (isset($userrole)) @if ($trows) @if ($trows->view == 1) {{ 'checked' }} @endif
                                    @endif
									@endif />
									<label class="switch-paddle" for="view-{{ $pt['id'] }}">
										<span class="switch-active" aria-hidden="true"></span>
										<span class="switch-inactive" aria-hidden="true"></span>
									</label>
							</div>

						</div>
						<div class="col-4 col-md-2 title citems">

							<div class="switch editbox m-0">
								<input class='switch-input status-btn ser_status' name="modules[{{ $pt['id'] }}]['edit']"
									id="edit-{{ $pt['id'] }}" data-selid="{{ $pt['id'] }}" value="1" type="checkbox"
									@if (isset($userrole)) @if ($trows) @if ($trows->edit == 1) {{ 'checked' }} @endif
									@endif @endif />
								<label class="switch-paddle" for="edit-{{ $pt['id'] }}">
									<span class="switch-active" aria-hidden="true"></span>
									<span class="switch-inactive" aria-hidden="true"></span>
								</label>
							</div>

						</div>
						<div class="col-4 col-md-2 title citems">
							<div class="switch deletebox m-0">
								<input class=' switch-input status-btn ser_status' name="modules[{{ $pt['id'] }}]['delete']"
									id="delete-{{ $pt['id'] }}" data-selid="{{ $pt['id'] }}" value="1" type="checkbox"
									@if (isset($userrole)) @if ($trows) @if ($trows->delete == 1) {{ 'checked' }} @endif
									@endif @endif />
								<label class="switch-paddle" for="delete-{{ $pt['id'] }}">
									<span class="switch-active" aria-hidden="true"></span>
									<span class="switch-inactive" aria-hidden="true"></span>
								</label>
							</div>
						</div>
					</div>

						@if ($child && count($child) > 0)
							@php $nrow = 'odd'; @endphp
							@foreach ($child as $ch)
								@if (isset($userrole))
									@php
										$trows = DB::table('org_usr_role_action')
											->where('usr_role_id', $userrole->id)
											->where('module_id', $ch['id'])
											->where('is_deleted', 0)
											->where('is_active', 1)
											->first();
									@endphp
								@endif


					<div class="row">
						<div class="col-12 col-md-6 sub-title module {{ $nrow }}">{{ $ch['name'] }}</div>
						<div class="col-4 col-md-2 sub-title {{ $nrow }} citems">
							<div class="switch viewbox m-0">
								<input class='switch-input status-btn ser_status' name="modules[{{ $ch['id'] }}]['view']"
									id="ch-view-{{ $ch['id'] }}" data-selid="{{ $ch['id'] }}" value="1"
									type="checkbox"
									@if (isset($userrole)) @if ($trows) @if ($trows->view == 1) {{ 'checked' }} @endif
									@endif
									@endif />
									<label class="switch-paddle m-0" for="ch-view-{{ $ch['id'] }}">
										<span class="switch-active" aria-hidden="true"></span>
										<span class="switch-inactive" aria-hidden="true"></span>
									</label>
							</div>
						</div>
						<div class="col-4 col-md-2 sub-title {{ $nrow }} citems">
							<div class="switch editbox m-0">
								<input class='switch-input status-btn ser_status' name="modules[{{ $ch['id'] }}]['edit']"
									data-selid="{{ $ch['id'] }}" id="ch-edit-{{ $ch['id'] }}" value="1" type="checkbox"
									@if (isset($userrole)) @if ($trows) @if ($trows->edit == 1) {{ 'checked' }} @endif
									@endif
								@endif />
								<label class="switch-paddle" for="ch-edit-{{ $ch['id'] }}">
									<span class="switch-active" aria-hidden="true"></span>
									<span class="switch-inactive" aria-hidden="true"></span>
								</label>
							</div>
						</div>
						<div class="col-4 col-md-2 sub-title {{ $nrow }} citems">
							<div class="switch deletebox m-0">
								<input class='switch-input status-btn ser_status' name="modules[{{ $ch['id'] }}]['delete']"
									id="ch-delete-{{ $ch['id'] }}" data-selid="{{ $ch['id'] }}" value="1" type="checkbox"
									@if (isset($userrole)) @if ($trows) @if ($trows->delete == 1) {{ 'checked' }} @endif
									@endif @endif />
								<label class="switch-paddle" for="ch-delete-{{ $ch['id'] }}">
									<span class="switch-active" aria-hidden="true"></span>
									<span class="switch-inactive" aria-hidden="true"></span>
								</label>
							</div>
						</div>
					</div>
							@php
							if ($nrow == 'odd') {
								$nrow = 'even';
							} else {
								$nrow = 'odd';
							}
							@endphp
							@endforeach
							@else
							<div class="row">
								<div class="col-12 br-line-wh"></div>
							</div>
							@endif
				</div>

		@endforeach
		@endif

	</div>

</div>
