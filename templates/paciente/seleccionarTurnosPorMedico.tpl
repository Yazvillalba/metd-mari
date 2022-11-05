 {include file="templates/header.tpl"}

    <div class="container ">

    <h3>{$tituloIndexTurnos}</h3>
    
    <div>
        <h3>Médico: {$tituloMedico}  </h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Seleccionar</th>

                </tr>
            </thead>

            <tbody>
                {foreach from=$turnos item=$turno }
                    <tr>   
                        <td> </td>       
                        <td>{$turno->fecha}</td>
                        <td>{$turno->horario}</td>
                        <td><a class="btn btn-secondary" href="{BASE_URL}/productView/{$product->id}">Ver</a> </td>
                    </tr>
                {/foreach}     
            </tbody>
          
            <tfoot>

            </tfoot>
        </table>
        
    </div>

{include file="templates/footer.tpl" assign=name var1=value}