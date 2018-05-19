@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Photo</h1>
      </div>
      
    </div>
    <hr class="m-t-0">

 <div class="column">
        <a href="{{route('pictures.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> ajouter photo</a>
      </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Photo</td>
              
                <td>Supprimer</td>
            </tr>
        </thead>
        <tbody>
            @if($pictures->isEmpty())
                <tr>
                    <td colspan="5" align="center"> Aucune photo .</td>
                </tr>
            @else
                @foreach($pictures as $picture)
                    <tr >
                        <td>
                        <?php  $db = mysqli_connect("localhost","root","","cms2"); //keep your db name
$sql = "SELECT * FROM pictures WHERE id = $picture->id";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);

echo $result['image'];


                             echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';  ?>
                        </td>
                        
                        
                     
                        <td>
                            <a href="{{ route('manage.pictures.confirm', $picture->id) }}">
                            <i class="fa fa-fw fa-remove"></i>>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
