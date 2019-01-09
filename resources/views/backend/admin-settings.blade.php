@extends('layouts.backend')

@section('content')
    


<div class="wrapper my-4">
            

        <h4 class="mb-4">Edit role</h4>

        {{ cms_notification($errors) }}

        <table class="table table-responsive">
            <tr>
                <th>Anyone can register</th>
                <td>
                <form action="{{ route('register-permission') }}" method="post">
                        @csrf
                        <input type="checkbox" name="permission">
                    </form>
                </td>
            </tr>

            <tr>
                    <th>Set Roles for registered user</th>
                    <td>
                        <form action="">
                            <div class="form-group">
                              <select class="form-control" name="role" id="">
                                <option></option>
                              </select>
                            </div>
                        </form>
                    </td>
                </tr>

            </table>

        @endsection
