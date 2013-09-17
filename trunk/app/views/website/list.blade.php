@extends('layouts.common')
@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                </tr>
                </thead>
                @if($websites->getTotal()==0)
                <tbody>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <br/>
                        <strong>
                            No Data Found
                        </strong>
                        <br/>
                        <br/>
                    </td>
                </tr>
                </tbody>
            </table>
            @else
            <tbody>

            <?php $count = 1;?>
            @foreach ($websites as $row)
            <tr >
                <td><%(($websites->getCurrentPage() - 1) * Constants::PAGING_COUNT + $count++)%></td>
                <td><% $row->name %></td>
                <td><% AppHtmlHelper::get404Code($row->code);%></td>
            </tr>
            @endforeach
            </tbody>
            </table>
            <?php echo $websites->links(); ?>
            @endif
            </table>
        </div>
    </div>
</div>
@stop