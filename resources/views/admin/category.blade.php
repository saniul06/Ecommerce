@extends('admin.admin-master')

@section('category')
    active
@endsection

@section('admin-content')
    <div class="row row-sm">
        <div class="col-md-8">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Categories</h6>
                <div class="table-wrapper">
                    <table class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Sl</th>
                                <th class="wd-15p">Category Name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody id='category-table'>

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="category_name">Name</label>
                        <input type="text" id="category_name" class="form-control" placeholder="Enter Category">
                        <div id='cat_error' style='color:red'>

                        </div>
                        <br>
                        <label for="exampleInputEmail1">Status</label>
                        <select id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div id="changed">
                        <button type="submit" class="btn btn-primary" onclick="addCat()">Add</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
