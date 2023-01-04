@extends('layout')


@section('content')
<br>
<br>
<div class="container overflow-hidden text-center  ">

  <header class="section-header text-center">
    <h2>Data Peminjaman</h2>
    <p>Lab. Pengembangan Perangkat Lunak dan Gim</p>
  </header>
  @if (Session::get('add'))
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-check" style="font-size:20px;"></i> {{Session::get('add')}} <i class="fas fa-exclamation"></i></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::get('update'))
        
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-clipboard-check"  style="font-size:20px;"></i>  {{Session::get('update')}} <i class="fas fa-exclamation"></i></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::get('done'))
        
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-laptop" style="font-size: 16px;"></i> {{Session::get('done')}} <i class="fas fa-exclamation"></i></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::get('delete'))
        
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-trash-alt"></i> {{Session::get('delete')}} <i class="fas fa-exclamation"></i></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::get('notAllowed'))
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-user-check"  style="font-size:20px;"></i>  {{Session::get('notAllowed')}} <i class="fas fa-exclamation"></i></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::get('welcom'))
        
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong> {{Session::get('welcom')}} <i class="far fa-hand-sparkles"></i></strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="row text-center">
  <div class="col-sm-6">
    <div class="card pinjam">
      <div class="card-body">
        <div >
        <i class="fas fa-sign-out-alt" style="color: #000; font-size: 35px;"></i>
      </div>
              <div >
                <h4>
                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                </h4>
                <p style="font-size:18px;">Total Data Dipinjamkan</p>
                <p>{{\Carbon\Carbon::now()->format('j F Y') }}</p>
                
              </div>
      </div>
    </div>
    
  </div>
  <div class="col-sm-6">
    <div class="card kembali">
      <div class="card-body">
        <div >
        <i class="fas fa-exchange-alt"  style="color: #000; font-size: 35px;"></i>
      </div>
              <div>
                <h4>
                  <!-- {{!is_null($laptops) ? count($laptops)  : '-'}} -->
                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahs->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                </h4>
                <p style="font-size:18px;">Total Data Dikembalikan</p>
                <p>{{\Carbon\Carbon::now()->format('j F Y') }}</p>
              </div>
      </div>
    </div>
    
  </div>
</div>

  <br>
  <div class="mb-2  d-flex " >
  <a href="{{ route('laptop.create')}}"  class="btn btn-outline-primary  ml"  type="button" ><i class="fas fa-plus"></i> add</a>
  </div>
  <!-- <li><a class="btn getstarted scrollto" href="">  Add</a></li> -->
  <div class="card text-center">
  <table class="table ">
  <thead>
    <tr class="table-primary">
      <th scope="col">NIS</th>
      <th scope="col">NAME</th>
      <th scope="col">REGION</th>
      <th scope="col">PURPOSES</th>
      <th scope="col">KET</th>
      <th scope="col">DATE</th>
      <th scope="col">RETURN DATE </th>
      <th scope="col">TEACHER</th>
      <th scope="col" colspan="3">ACTION</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach ($laptops as $data)
    <tr>
      <td>{{$data['nis'] }}</td>
      <td>{{$data['name'] }}</td>
      <td>{{$data['region'] }}</td>
      <td>{{$data['purposes'] }}</td>
      <td>{{$data['ket'] }}</td>
      <td><span class="date">     </span></td>
      <td class="text-warning fw-bold" style="">{{ $data['status'] ? \Carbon\Carbon::parse($data['done_time'])->format('j F Y') : '-'}}</td>
      <td>{{$data['teacher'] }}</td>
      <td><a href="/laptop/edit/{{ $data ['id'] }}" class="fas fa-edit text-primary" style="text-decoration:none;"></a></td>
      <td>
          <form action="/laptop/complated/{{$data['id']}}" method="POST">
          @csrf
          @method('PATCH')
          <button type="submit" class="fas fa-check-circle text-success" style="padding: 0; border: none; background: none;"></button> 
          </form> 
      </td>
      <td>
      <form action="{{route('laptop.delete', $data['id'])}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="fas fa-times-circle text-danger" style="padding: 0; border: none; background: none;"></button> 
          </form> 
    </tr>
    @endforeach
  </tbody>
</table>
</div>

</div>

@endsection