<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add New Location</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{ route('location.add') }}">
        @csrf

        <div class="row">

            <!-- type -->
            <div class="col-md-12 col-12 form-group">
                <label>Type</label><span class="require-span">*</span>
                <select name="type" class="form-control">
                    @foreach( $types as $type )
                    <option value="{{ $type['value'] }}">{{ $type['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 form-group text-right">
                <button type="submit" class="btn btn-outline-dark">
                    Add
                </button>
            </div>

        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>