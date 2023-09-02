@if(session('toast-error'))
    <div class="toast" data-delay="5000">
        <div class="toast-body py-3 d-flex bg-danger text-white">
            <strong class="ml-auto">
                {{session('toast-error')}}
            </strong>
            <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.toast').toast('show');
        })
    </script>
@endif
