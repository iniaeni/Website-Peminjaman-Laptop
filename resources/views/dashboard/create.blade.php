@extends('layout')

@section('content')

<br>
<br>
<br>
<div class="container px-5 align-center">
  <div class="row gx-6">
    <center>
    <div class="col-6 text-start">
    <table class="table">
    <thead>
    <tr>
    
      <th scope="col">FORM INPUT</th>
    </tr>
  </thead>
</table>
    
    <!-- <div class="p-3 border bg-light">Custom column padding</div> -->
     <form action="/laptop/store" method="POST">
        @csrf
        @method('POST')
     <div class="mb-3">
        <label for="" class="form-label ">NAME</label>
        <input class="form-control" placeholder="" type="text" name="name">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">PURPOSES</label>
            <textarea name="purposes" class="form-control" placeholder="Tujuan Pinjam" id="" style="height: 100px"></textarea> 
    </div>
    <div class="mb-3">
        <label for="" class="form-label">KET</label>
            <textarea name="ket" class="form-control" placeholder="Keterangan Laptop" id="" style="height: 100px"></textarea> 
    </div>
    <div class="row mb-3">
        <div class="col-6">
        <label for="" class="form-label">NIS</label>
        <input class="form-control" placeholder="" type="text" name="nis">
    </div>
    <div class="col-6">
        <label for="" class="form-label">REGION</label>
        <input class="form-control" placeholder="" type="text" name="region"> 
    </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label ">DATE</label>
        <input class="form-control" placeholder="" type="date" name="date">
    </div>

    <div class="mb-3">
        <label for="" class="form-label ">TEACHER NAME</label>
        <input class="form-control" placeholder="" type="text" name="teacher">
    </div>
    <div class="d-grid gap-2">
    <button class="btn btn-primary" type="submit" >Submit</button>
    <a href="{{ route('laptop.index')}}" class="btn btn-outline-secondary mr-2"  type="button" >Cancel</a>
    <br></div>
    </div>
    
     </form>

   
    </center>
  </div>
</div>

