@extends('admin.admin_dashboard')


@section('admin')

<div class="page-content">

<div class="row">
    <div class="col-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">

            <h6 class="card-title mb-0">Product list</h6>

            <a href="{{ route('admin.categorie.list') }}">
                <button>
                    <h5>Categorie</h5>
                </button>
            </a>

          </div>
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th class="pt-0">Order Id</th>
                  <th class="pt-0">Customer</th>
                  <th class="pt-0">Product</th>
                  <th class="pt-0">Amount</th>
                  <th class="pt-0">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Fahim</td>
                  <td>Leather bag</td>
                  <td>$98.00</td>
                  <td><span class="badge bg-success">Paid</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Mahim</td>
                  <td>Fashion jeket</td>
                  <td>$55.00</td>
                  <td><span class="badge bg-danger">Pending</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Likhon</td>
                  <td>Cotton tops</td>
                  <td>$85.00</td>
                  <td><span class="badge bg-danger">Unpaid</span></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Bijoy</td>
                  <td>Black half shirt</td>
                  <td>$50.00</td>
                  <td><span class="badge bg-danger">Unpaid</span></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Rahim</td>
                  <td>Leather shoe</td>
                  <td>$60.00</td>
                  <td><span class="badge bg-danger">Unpaid</span></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Karim</td>
                  <td>Leather bag</td>
                  <td>$98.00</td>
                  <td><span class="badge bg-success">Paid</span></td>
                </tr>
                <tr>
                  <td class="border-bottom">7</td>
                  <td class="border-bottom">Hasem</td>
                  <td class="border-bottom">Fashion jeket</td>
                  <td class="border-bottom">$55.00</td>
                  <td class="border-bottom"><span class="badge bg-danger">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection

