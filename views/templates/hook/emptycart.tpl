{**
 *  Module EmptyCart For Help & Support angelmaria87@gmail.com
 *
 *  @author    Ángel María de Troya de la Vega
 *  @copyright 2014
**}

<!-- /MODULE Home Featured Products -->

<form action = "{$link->getModuleLink("emptycart", "reset")|escape:"htmlall"}" id="emptycart" method="post" enctype="multipart/form-data">
    <input type="submit"  name ="btnSubmit" value="{l s='Reset Cart' mod='emptycart'}" class = "button">
</form>


