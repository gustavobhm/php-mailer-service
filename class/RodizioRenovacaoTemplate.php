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

                                        <p style="padding: 0 1em; margin: 2em auto;" align="right">São Paulo, {param1} de {param2} de {param3}.</p>

                                        <p style="padding: 0 1em; margin: 2em auto;">{param4} {param5} [Nome completo] - CRM/SP: [Nº. CRM]</p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Considerando a proximidade do término da validade de sua liberação do rodízio municipal, concedida ao veículo de placa [Placa], que ocorrerá em [data do vencimento], <strong>solicitamos que providencie a entrega dos documentos, para a renovação anual obrigatória, até o dia [prazo de entrega] em um dos endereços do Cremesp na capital.</strong> 
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            As orientações e o requerimento de solicitação, bem como o boleto para pagamento da taxa, estão disponíveis no site do Cremesp, na 
                                            <a href="http://www.cremesp.org.br/?siteAcao=CartaoDsv">Área do Médico</a>.
                                            Esta área é de acesso restrito; caso não disponha de senha ou tiver necessidade de ajuda para acessar o ambiente, entre em contato com a Central de Atendimento Telefônico, pelo número (11) 4349-9900, de segunda a sexta-feira, das 8h às 20h. 
                                        </p>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em 0 1em 0;">
                                            <strong><u>OBSERVAÇÕES:</strong></u> 
                                        </p>

                                        <ul>
                                            <li style="margin: 1em 2em 1em 3em;">Desconsidere esta mensagem, caso já tenha providenciado o protocolo ou não deseje solicitar a renovação da isenção do rodízio para o veículo supramencionado;</li>
                                            <li style="margin: 1em 2em 1em 3em;">É possível que a documentação seja entregue após a data estipulada, devendo, neste caso, cumprir as restrições do rodízio, após o vencimento da vigência atual ([data do vencimento]);</li>
                                            <li style="margin: 1em 2em 1em 3em;">Após o vencimento da vigência atual, mesmo que a documentação tenha sido entregue ao Cremesp no período adequado, o médico deve aguardar o comunicado informando o seu resultado;</li>
                                            <li style="margin: 1em 2em 1em 3em;">Não circule em dias e horários do rodízio antes de receber a resposta confirmando a aprovação do pedido.</li>
                                        </ul>

                                        <p style="text-indent:2em; padding: 0 1em; margin: 2em auto;">
                                            Sem mais para o momento, renovamos nossos protestos de elevada estima e distinta consideração e colocamo-nos a disposição para eventuais esclarecimentos.
                                        </p>

                                        <p style="padding: 0 1em; margin: 2em 0 1em 0;" align="center">Atenciosamente,</p>

                                        <p style="padding:0; margin:0;" align="center">
                                            <img  src="cid:signature" alt="Signature">
                                        </p>

                                        <p style="padding: 0 1em; margin: 0 0 0 0;" align="center">Dr. Angelo Vattimo</p>

                                        <p style="padding: 0 1em; margin: 0 0 0 0;" align="center">Diretor Primeiro Secretário</p>

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