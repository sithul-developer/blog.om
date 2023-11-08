<form action="{{ route('permission.store')}}" method="POST" >
    @csrf
    <label for="">Permission Name </label>
    <input type="text" name="permission" value="{{old('permission')}}" id="" placeholder="permission">
    <button type="submit">save</button>
</form>
