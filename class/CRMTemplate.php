<?php

class CRMTemplate extends Template
{
    
    const EMAIL_TO = CRM_TEMP_RESP_EMAIL;

    private $embeddedImages = array(
        array(
            'path' => 'img/logo-cremesp.png',
            'name' => 'logo-cremesp'
        ),
        array(
            'path' => 'img/iso-certificate.png',
            'name' => 'iso-certificate'
        )
    );

    private $htmlBody = '<!DOCTYPE html>
                            <html lang="pt">
                                <head>
                                    <meta charset="UTF-8">
                                    <title>Cremesp</title>
                                </head>
                                <body>
                                    <div style="font-family:Arial, Helvetica, sans-serif; font-size: 16px;  text-align: justify;width: 750px; line-height: 2em;">
                                    	<div style="opacity: 0.5; filter: alpha(opacity=50); padding:2em 0; border-bottom: 1px solid grey;">
                                    		<a href="http://www.cremesp.org.br/">
                                                <img style="display: block; margin-left: auto; margin-right: auto; width: 50%;" src="cid:logo-cremesp" alt="Cremesp">
                                    		</a>
                                    	</div>
                                    	<div>
                                        	<p style="padding: 0 1em; margin: 2em auto;">{param1}</p>
                            
                                        	<p style="padding: 0 1em; margin: 2em auto;">{param2} <strong>{2}</strong></p>
                            
                                        	<p style="text-indent:2em; padding: 0 1em; margin: 2em 0 2em 1em;">Temos a grata satisfação de comunicar que o seu processo de
                                        		inscrição foi concluído com êxito, e seu número de registro é <strong>{1}</strong>,
                                        		encontra-se ativo e a disposição para consulta em nosso site.</p>
                            
                                        	<p style="text-indent:2em; padding: 0 1em; margin: 2em 0 2em 1em;">O CREMESP {param3} parabeniza e deseja votos de uma carreira profícua e
                                        		balizada dentro dos princípios éticos que regulam nossa profissão.</p>
                            
                                        	<p style="text-indent:2em; padding: 0 1em; margin: 2em 0 2em 1em;">
                                                Caso necessite de documento para fins de comprovação acesse:
                                                <a href="http://www.cremesp.org.br/?siteAcao=CertidaoPublica">http://www.cremesp.org.br/?siteAcao=CertidaoPublica</a>
                                            </p>
                            
                            
                                        	<p style="padding: 0 1em; margin: 2em auto;">Atenciosamente,</p>
                            
                                        	<p style="padding: 0 1em; margin: 2em auto;">Diretoria</p>
                                    	</div>
                                    	<div style="padding:2em 1em; border-top: 1px solid grey; position:relative; opacity: 0.5; filter: alpha(opacity=50);">
                                            <div style="float:left; font-size:0.8em; line-height:1.5em;">
                                        		<p style="margin: 0 auto;">Rua Frei Caneca, 1.282 - Consolação</p>
                                        		<p style="margin: 0 auto;">CEP: 01307-002 - São Paulo - SP</p>
                                        		<p style="margin: 0 auto;">Telefone: (11) 4349-9900 / www.cremesp.org.br</p>
                                            </div>
                            
                                    		<img style="float:right;"  src="cid:iso-certificate" alt="ISO 9001:2015">
                                    	</div>
                                    </div>
                                </body>
                            </html>';

    function __construct()
    {
        parent::__construct(CRM_TEMPLATE_CODE);
    }

    function getHtmlBody($email)
    {
        $bodyParameters = json_decode(ProceduresDAO::executeProcedure($this->procedure, $email), true);

        $gender = $bodyParameters[4];

        if ($gender == 'F') {
            $bodyParameters['param1'] = "Prezada";
            $bodyParameters['param2'] = "Doutora";
            $bodyParameters['param3'] = "a";
        } else {
            $bodyParameters['param1'] = "Prezado";
            $bodyParameters['param2'] = "Doutor";
            $bodyParameters['param3'] = "o";
        }

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