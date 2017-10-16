<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="tabela" class="table table-bordered  table-hover table-responsive text-center" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                                <th>Conta</th>
                                <th>Status</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tb_user as $tb) {
    ?>
                            <tr>
                                <td>
                                    <?php echo $tb['nome'] ?>
                                </td>
                                <td>
                                    <?php echo $tb['email'] ?>
                                </td>
                                <td>
                                    <?php echo $tb['cpf'] ?>
                                </td>
                                <td>
                                    <?php  if($tb['tipo'] == 0){ 
                                        echo "Admin";
                                    } else 
                                    { echo "Usuário";
                                } ?>
                                </td>
                                <td>
                                    <?php 
                                      if($tb['status'] == 0){
                                        echo "Criado";
                                      } else if ($tb['status'] == 1){
                                        echo "Ativo";
                                      } else {
                                        echo "Bloqueado";
                                      }
                                     ?>
                                </td>
                                <td><a href="
                                    <?php echo base_url('painel_controle/usuario/alterar/') .$tb['id']?>"><i class="fa fa-edit"></i>
                                </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</section>