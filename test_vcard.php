<script type="text/javascript">

var express = require('express');
var router = express.Router();

module.exports = function (app) {
  app.use('/', router);
};

router.get('/', function (req, res, next) {

    var vCard = require('vcard-js');

    //create a new vCard
    vCard = vCard();

    //set properties
    vCard.firstName = 'Eric';
    vCard.middleName = 'J';
    vCard.lastName = 'Nesser';
    vCard.organization = 'ACME Corporation';

    //set content-type and disposition including desired filename
    res.set('Content-Type', 'text/vcard; name="enesser.vcf"');
    res.set('Content-Disposition', 'inline; filename="enesser.vcf"');

    //send the response
    res.send(vCard.getFormattedString());
});

</script>
