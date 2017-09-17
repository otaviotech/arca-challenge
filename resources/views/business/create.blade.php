@extends('template.admin')

@section('title', "Business Finder")

@section('content')

  <div ng-controller="BusinessAddController">

    <h1 class="app-header">Business Finder Admin</h1>
    <div class="row">
      <div class="col-md-10">
        <h2 class="app-header-2">Add Businesses</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5">
        <div class="form">
          <form  action="/admin/business/store" method="post" id="businessForm" name="businessForm" novalidate>

            {{ csrf_field() }}

            <div class="form-group" ng-class="{'has-error': businessForm.title.$invalid && businessForm.title.$dirty}" >
              <label for="title" class="control-label">Title</label>
              <input type="text" id="title" class="form-control" name="title" ng-model="business.title" ng-required="true" />
              <span class="help-block" ng-if="businessForm.title.$invalid && businessForm.title.$dirty">A title is required.</span>
            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.phone.$invalid && businessForm.phone.$dirty}">
              <label for="phone" class="control-label">Phone</label>
              <input type="text" id="phone" class="form-control" name="phone" ng-model="business.phone" ng-required="true" />
              <span class="help-block" ng-if="businessForm.phone.$invalid && businessForm.phone.$dirty">A phone is required.</span>

            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.address.$invalid && businessForm.address.$dirty}">
              <label for="address" class="control-label">Address</label>
              <input type="text" id="address" class="form-control" name="address" ng-model="business.address" ng-required="true"/>
              <span class="help-block" ng-if="businessForm.address.$invalid && businessForm.address.$dirty">An address is required.</span>
            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.cep.$invalid && businessForm.cep.$dirty}">
              <label for="zipcode" class="control-label">Zipcode</label>
              <input type="text" id="cep" class="form-control" name="cep" ng-model="business.cep" ng-required="true"/>
              <span class="help-block" ng-if="businessForm.cep.$invalid && businessForm.cep.$dirty">A zipicode is required.</span>
            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.city.$invalid && businessForm.city.$dirty}">
              <label for="city" class="control-label" >City</label>
              <input type="text" id="city" class="form-control" name="city" ng-model="business.city" ng-required="true"/>
              <span class="help-block" ng-if="businessForm.city.$invalid && businessForm.city.$dirty">A city is required.</span>
            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.state.$invalid && businessForm.state.$dirty}">
              <label for="state" class="control-label">State</label>
              <input type="text" id="state" class="form-control" name="state" ng-model="business.state" ng-required="true"/>
              <span class="help-block" ng-if="businessForm.state.$invalid && businessForm.state.$dirty">A state is required.</span>
            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.description.$invalid && businessForm.description.$dirty}">
              <label for="description" class="control-label">Description</label>
              <textarea type="text" id="description" class="form-control" name="description" rows="5" ng-model="business.description" ng-required="true"></textarea>
              <span class="help-block" ng-if="businessForm.description.$invalid && businessForm.description.$dirty">A description is required.</span>
            </div>

            <div class="form-group" ng-class="{'has-error': businessForm.categories.$invalid && businessForm.categories.$dirty}">
              <label for="select-categories">Categories</label>
              <select class="form-control" style="width: 100%" id="select-categories" name="categories[]" multiple="multiple" ng-model="business.categories" ng-required="true">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              <span class="help-block" ng-if="businessForm.categories.$invalid && businessForm.categories.$dirty">At least one category is required.</span>
            </div>
          </form>
        </div>


      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-md-offset-4">
        <button type="submit" class="btn btn-block btn-primary" ng-disabled="businessForm.$invalid" ng-click="saveBusiness(business)">Save</button>
      </div>
    </div>

    <br>

  </div>

@endsection


@section('scripts')
  @include('business.partials.add-scripts')
@endsection
