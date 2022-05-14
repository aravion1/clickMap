<div id="domen-form">
    <form action="#">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        @csrf
        <input type="text" name="domain" placeholder="Домен">
        <input type="submit" value="Добавить">
    </form>
</div>
