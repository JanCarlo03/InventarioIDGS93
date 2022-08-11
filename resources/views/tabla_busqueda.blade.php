<div class="table-responsive" id="resultados">
                            <table class="table  ">
                                <thead>
                                    <tr>
                                    <th class="text-center"> <b> Código del producto</b></th>
                                    <th class="text-center"> <b> Nombre del producto</b></th>
                                    <th class="text-center"> <b> Categoría </b></th>
                                    <th class="text-center"> <b> Añadir </b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($busqueda as $producto)
                                        <td class="text-center">{{ $producto->codigo_producto }}</td>
                                        <td class="text-center">{{ $producto->nombre_producto }} {{ $producto->descripcion }}</td>
                                        <td class="text-center">{{ $producto->nombre_categoria }}</td>
                                        <td class="text-center">
                                        @if( $producto->cantidad != 0 )
                                            <a class="btn-floating btn-sm btn-secondary" href="{{ route('add',['id' => $producto->idproducto]  ) }}"><i class="fas fa-cart-plus"></i>
                                        @else
                                             <a class="btn-floating btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#solicitud_extra"><i class="fas fa-cart-plus"></i></a>
                                          <!-- Modal -->
                                            <div class="modal fade" id="solicitud_extra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-bottom-right modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                    <!--Header-->
                                                    <div class="modal-header">
                                                        <p class="heading">PRODUCTOS SIN STOCK
                                                        </p>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" class="white-text">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!--Body-->
                                                    <div class="modal-body">

                                                        <div class="row">
                                                        <div class="col-3">
                                                            <p></p>
                                                            <p class="text-center">
                                                            <i class="fas fa-ban fa-2x"></i>
                                                            </p>
                                                        </div>

                                                        <div class="col-9">
                                                            <p>No se encuentra en inventario actualmente </p>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer flex-center">
                                                        <a type="button" class="btn btn-danger btn-rounded" data-bs-dismiss="modal">Cerrar</a>
                                                    </div>
                                                    </div>
                                                <!--/.Content-->
                                            </div>
                                        </div>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          
                        </div>
                        <span class="table-add float-right mb-3 mr-2"><a href="e" class="text-success"></a>
                {{ $busqueda->links() }}
            </span>