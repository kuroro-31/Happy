@if ($errors->any())
    <ul class="my-4">
        @foreach ($errors->all() as $error)
            <li class="mb-4">
                <toast-modal :error="true" :message='@json($error)'></toast-modal>
            </li>
        @endforeach
    </ul>
@endif
