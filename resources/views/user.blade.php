<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{-- <h1>LARAVEL 10 TEST </h1> --}}

    <form method="POST" action="user">
        <input type="hidden" name="action_type" id="action_type" value="Add">
        <input type="hidden"  name="user_ID" id="user_ID" placeholder="User ID" >
        <input type="text" name="user_fname" id="user_fname" placeholder="First Name">
        <input type="text" name="user_lname" id="user_lname" placeholder="Last Name">
        <input type="text" name="user_nickname" id="user_nickname" placeholder="Nick Name">
        <input type="text" name="user_age" id="user_age" placeholder="Age">
        <button type="submit" >Submit</button>
        
        @if (\Session::has('success'))
        <div style="color:green" class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
        @endif

        @if($errors->any())
        <div style="color:red" class="alert alert-success">
            {{$errors->first()}}
        </div>

        @endif

        @csrf
    </form>
    <br>

   
    <table>
        <t-head>
            <tr>
                <th>No.</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Nickname</th>
                <th>Age</th>
                <th colspan=2>Actions</th>

    
            </tr>
        </t-head>
        <t-body>
            @foreach($data as $key=> $val)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$val['FirstName']}}</td>
                <td>{{$val['LastName']}}</td>
                <td>{{$val['Nickname']}}</td>
                <td>{{$val['Age']}}</td>
                <td>

                    <button class="editBtn" onclick="userEdit({{ $val }})">Edit</button>
                </td>
        <td>

        <button class="deleteBtn" onclick="userDelete({{ $val }})">Delete</button></td>

</td>
            </tr>
            @endforeach
        </t-body>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>
    <script>
        function userEdit(params){
            document.getElementById("user_ID").value = params.ID;
            document.getElementById("user_fname").value = params.FirstName;
            document.getElementById("user_lname").value = params.LastName;
            document.getElementById("user_nickname").value = params.Nickname;
            document.getElementById("user_age").value = params.Age;
            document.getElementById("action_type").value = "Update";

        }
        function userDelete(params){
            id =  params.ID
            axios.delete('user/'+ id).then(()=>{
                window.location.reload();
            })
        }
    </script>
</body>
</html>
<style scoped>
    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
}
h2{
    color: brown;
}

.editBtn{
    background: rgb(139, 203, 200)
    
}
.deleteBtn{
    background: rgb(206, 124, 124)
    
}
</style>