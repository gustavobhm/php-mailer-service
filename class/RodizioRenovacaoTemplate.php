<?php

class RodizioRenovacaoTemplate extends Template
{

    const EMAIL_TO = ROD_RENOVACAO_TEMP_RESP_EMAIL;

    private $embeddedImages = array(
        array(
            'path' => 'img/ass_angelo_vattimo.jpg',
            'name' => 'signature'
        )
    );

    private $htmlBody = '<!DOCTYPE html>
                            <html lang="pt">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Cremesp</title>
                                </head>
                                <body>
                                    <div style="font-family:Arial, Helvetica, sans-serif; font-size: 16px;  text-align: justify;width: 750px; line-height: 1.5em;">

                                        <p style="padding: 0 1em; margin: 2em auto;" align="right">S�o Paulo, {param1} de {param2} de {param3}.</p>

                                        <p style="padding: 0 1em; margin: 2em auto;">{param4} {param5} [Nome completo] - CRM/SP: [N�. CRM]</p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Considerando a proximidade do t�rmino da validade de sua libera��o do rod�zio municipal, concedida ao ve�culo de placa [Placa], que ocorrer� em [data do vencimento], <strong>solicitamos que providencie a entrega dos documentos, para a renova��o anual obrigat�ria, at� o dia [prazo de entrega] em um dos endere�os do Cremesp na capital.</strong> 
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            As orienta��es e o requerimento de solicita��o, bem como o boleto para pagamento da taxa, est�o dispon�veis no site do Cremesp, na 
                                            <a href="http://www.cremesp.org.br/?siteAcao=CartaoDsv">�rea do M�dico</a>.
                                            Esta �rea � de acesso restrito; caso n�o disponha de senha ou tiver necessidade de ajuda para acessar o ambiente, entre em contato com a Central de Atendimento Telef�nico, pelo n�mero (11) 4349-9900, de segunda a sexta-feira, das 8h �s 20h. 
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em 0 1em 0;">
                                            <strong><u>OBSERVA��ES:</strong></u> 
                                        </p>

                                        <ul>
                                            <li style="margin: 1em 2em 1em 3em;">Desconsidere esta mensagem, caso j� tenha providenciado o protocolo ou n�o deseje solicitar a renova��o da isen��o do rod�zio para o ve�culo supramencionado;</li>
                                            <li style="margin: 1em 2em 1em 3em;">� poss�vel que a documenta��o seja entregue ap�s a data estipulada, devendo, neste caso, cumprir as restri��es do rod�zio, ap�s o vencimento da vig�ncia atual ([data do vencimento]);</li>
                                            <li style="margin: 1em 2em 1em 3em;">Ap�s o vencimento da vig�ncia atual, mesmo que a documenta��o tenha sido entregue ao Cremesp no per�odo adequado, o m�dico deve aguardar o comunicado informando o seu resultado;</li>
                                            <li style="margin: 1em 2em 1em 3em;">N�o circule em dias e hor�rios do rod�zio antes de receber a resposta confirmando a aprova��o do pedido.</li>
                                        </ul>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Sem mais para o momento, renovamos nossos protestos de elevada estima e distinta considera��o e colocamo-nos a disposi��o para eventuais esclarecimentos.
                                        </p>

                                        <p style="padding: 0 1em; margin: 2em 0 1em 0;" align="center">Atenciosamente,</p>

                                        <p style="padding:0; margin:0;" align="center">
                                            <img  src="cid:signature" alt="Signature">
                                        </p>

                                        <p style="padding: 0 1em; margin: 0 0 0 0;" align="center">Dr. Angelo Vattimo</p>

                                        <p style="padding: 0 1em; margin: 0 0 0 0;" align="center">Diretor Primeiro Secret�rio</p>

                                    </div>
                                </body>
                            </html>';

    function __construct()
    {
        parent::__construct(RODIZIO_RENOVACAO_TEMPLATE_CODE);
    }

    function getHtmlBody($email)
    {
        $bodyParameters = json_decode(ProceduresDAO::executeProcedure($this->procedure, $email), true);

        if (isset($bodyParameters)) {
            $bodyParameters[5] = DateUtils::formatDateToPTBR($bodyParameters[5]);
            $bodyParameters[6] = DateUtils::formatDateToPTBR($bodyParameters[6]);
            $bodyParameters[16] = DateUtils::formatDateToPTBR($bodyParameters[16]);

            $gender = $bodyParameters[14];

            if ($gender == 'F') {
                $bodyParameters['param4'] = "Prezada";
                $bodyParameters['param5'] = "Dra";
            } else {
                $bodyParameters['param4'] = "Prezado";
                $bodyParameters['param5'] = "Dr";
            }
        }

        $bodyParameters['param1'] = date("d");
        $bodyParameters['param2'] = DateUtils::formatMonthToPTBR(date("Y-m-d"));
        $bodyParameters['param3'] = date("Y");

        return parent::setParametersInBodyContent($this->htmlBody, $bodyParameters);
    }

    function getEmbeddedImages()
    {
        return $this->embeddedImages;
    }

    function getEmailTo(){
        return $this::EMAIL_TO;
    }
}
?>