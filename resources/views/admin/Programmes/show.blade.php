@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Program Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                        @if($program->picture!=null)
                        
                    <img src="{{asset('public/uploads/images/'.$program->picture)}}" alt="{{$program->name }} " height="auto" width="150px" >
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $program->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Program Structure
                    </th>
                    <td>

                            {{ $program->program_structure}}

                    </td>
                </tr>

                <tr>
                    <th>
                        Duration
                    </th>
                    <td>

                        {{ $program->duration}}

                    </td>
                </tr>

                <tr>
                    <th>
                        No of Semesters
                    </th>
                    <td>

                        {{ $program->no_of_semesters}}

                    </td>
                </tr>


                <tr>
                    <th>
                        Eligibility Criteria
                    </th>
                    <td>

                        {{ $program->eligibility_criteria}}

                    </td>
                </tr>

                <tr>
                    <th>
                        Degree Completion Requirements
                    </th>
                    <td>

                        {{ $program->degree_completion_requirements}}

                    </td>
                </tr>





                </tbody>
            </table>
        </div>
    </div>


@endsection
