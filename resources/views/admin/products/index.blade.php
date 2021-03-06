@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>Productos
                <a href="{{ url('admin/products/create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i>&nbsp;Agregar producto</a>

                <form href="{{route('admin.products.index')}}" class="navbar-form navbar-left pull-right" role="search"  method="GET">
                    <div class="form-group">
                        <input class="form-control" name="name" type="text" placeholder="Pon el nombre" required="">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>

            </h1>

        </div>
        <div class="page">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                        <th>Categoria</th>
                        <th>Extracto</th>
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($product as  $products): ?>
                    <tr>

                            <td><img src="../img/products/{{ $products->image}}" width="40"></td>
                            <td>{{ $products->name }}</td>
                            <td>{{ $products->provider->name }}</td>
                            <td>{{ $products->category->name }}</td>
                            <td>{{ $products->extract }}</td>
                            <td>${{ number_format($products->price,2) }}</td>

                            <td>
                                <a href="{{ route('admin.products.edit', $products->slug) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.product.destroy', $products->slug]]) !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <hr>
           <?php echo $product->render(); ?>
        </div>
    </div>



@stop