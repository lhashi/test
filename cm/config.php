<?

/*---------------------------------------------------------------
  Notes: �ʲ������Ƥ϶��̴ؿ�������γ��פǤ�
  ---------------------------------------------------------------

                             �ؿ�����

      �ֹ�  �ؿ�̾                      ����
    ----------------------------------------------------------------
       1    cmOCILogon()                �Îގ����͎ގ����ؤ���³
       2    cmOCILogoff()               �Îގ�����³���������
       3    cmOCIExecuteSelect()        ���ȷ�ñ��ӣѣ�ʸ��ȯ��
       4    cmOCIExecuteUpdate()        ������ñ��ӣѣ�ʸ��ȯ��
       5    cmOCICommit()               �ȥ�󥶥������򥳥ߥåȤ��ޤ�
       6    cmOCIRollback()             �ȥ�󥶥����������Хå����ޤ�
       7    cmOCIError()                Oracle�Ύ��׎��Ҏ��������ޤμ���
       9    cmNullToString()            null�����ʸ������Ѵ�
      10    cmToOraString()             Oracle��ʸ������Ѵ�
      11    cmHtmlEntities()            Ŭ�Ѳ�ǽ��ʸ����HTML����ƥ��ƥ����Ѵ�����
      12    cmCreatexml()               XMLʸ�������
      13    cmGetErrorInfo()            DB��å�����
      14    cmSendMail                  �᡼�����դ���
      15    cmEcho()                    XMLʸ�����Ѵ�����
      16    cmWriteAccessroguDb()       ��������������Ͽ
      17    cmDeleteChar()             ��!�פ�ʸ������ɲ�
      18    cmAddChar()                 ʸ������Ѵ�
          19    cmAddQuotation()            ���󥰥륯�����ơ����������
    */
    define( "CM_ASP_FUNC", "/usr/local/bobio/ASP_FunctionCall/client/bin/ASP_FunctionCall" );
//    define( "CM_ASP_FUNC", "/usr/local/bobio/ASP_FunctionCall.test/client/bin/ASP_FunctionCall.test" );
    define( "CM_LOG_FUNCTION", "/home2/bbwtu/log/IDman/login/");

    define( "CM_INSERT_METHOD", "Charge_addVcode");
    define( "CM_UPDATE_METHOD", "Charge_changeVcode");
    define( "CM_DELETE_METHOD", "Charge_closeVcode");

    define( "CM_SEL_SYKBN", "");       //syori_kbn sansyou
    define( "CM_INS_SYKBN", "");       //syori_kbn touroku
    define( "CM_UPD_SYKBN", "");       //syori_kbn kousin
    define( "CM_DEL_SYKBN", "");       //syori_kbn sakujo

    // ���ƥʥ��ѥ��å�����ѿ� �ʲ���2�Ԥ��ɲä��ޤ���  ���� 2003/03/05
    define( "CM_SESS_MAINTE",   "SessMainte" );     //���ƥǡ���
    define( "CM_SESS_GYOMU",    "SessGyomu" );

    // ǧ��Directory�ѥ⥸�塼��ؤΥѥ����ɲ� 2005.03.16 ����
    define( "CM_NECAUTH_DIR", "/home2/bbwtu/AuthDirectory/auth/AuthDirectoryCom.sh");

    // CM_TMP_DIR�Υѥ����� 2005.03.16 ����
    //define( "CM_TMP_DIR", "/home2/bbwtu/html/grp/tmp" );
    define( "CM_TMP_DIR", "/home2/bbwtu/html/IDman/tmp" );
//    define( "CM_CSV_DIR", "../../data/IDman/csv");
    define( "CM_CSV_DIR", "/home2/bbwtu/data/IDman/csv");
    //define( "CM_BOCHECK_DIR", "../../data/IDman/BOcheck/");
    define( "CM_BOCHECK_DIR", "/home2/bbwtu/data/IDman/BOcheck/");
    define( "CM_BOPATH_DIR","/home2/bbwtu/html/IDman/ndir/RequestRegBO.sh");
    //define( "CM_CSV_DL_DIR", "../../data/IDman/csv_dl/");
    //define( "CM_CSV_DL_DIR", "/home2/bbwtu/data/IDman/csv_dl/");
    define( "CM_CSV_DL_DIR", "/home2/bbwtu/html/IDman/tmp/csv_dl/");
//    define( "TANTOUSYAID", "nhz42404");
//    define( "TANTOUSYAPW", "6870773432343034");
    define( "TANTOUSYAID", "une84534");
    define( "TANTOUSYAPW", "6d38343878333572");
    define( "SYSTEM_MAIL", "idman.pj@gp.biglobe.co.jp");
    define( "CM_EMAIL_DIR", "/home2/bbwtu/html/IDman/cm/template" );
    //define( "CM_EMAIL_DIR", "/home2/bbwtu/html/IDman/cm/template.test" );
    define( "KIGEN", 90 );
    define( "UPLOADCSVMAXSIZE", 3000000 );
    define( "PAYCODE", 99 );
    //��������ɹ�
    include ( "cm_const.inc" );

    //E_ERROR��E_PARSE�ʳ��ϲ��򤹤�
    error_reporting( E_ERROR | E_PARSE );

    //V190
    define( "CM_BIGMAN_LOGIN",  "/usr/bin/perl /home2/bbwtu/AuthDirectory/auth/AuthBigmanLogin.pl" );
    define( "CM_BIGMAN_LOGOUT", "/home2/bbwtu/AuthDirectory/auth/AuthBigmanLogout.sh" );

    //***************************************************************
    // �ؿ�̾ �� cmOCILogon
    // ����ǽ �� �Îގ����͎ގ����ؤ���³
    // ������ ��
    // ������ �� $conn (out) :�Îގ����͎ގ�����³ID
    //           $sErrMsg (out) :���׎��Ҏ���������
    // ����� �� true :����
    //           false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCILogon( &$conn,
                         &$sErrMsg ) {

        //putenv('ORACLE_BASE=/opt/oracle/product/10.2.0');
        //putenv('ORACLE_HOME=/opt/oracle/product/10.2.0');
        //putenv('ORA_NLS10=/opt/oracle/product/10.2.0/nls/data');
        //putenv('NLS_LANG=japanese_japan.JA16EUC');
        //putenv('LD_LIBRARY_PATH=/opt/oracle/product/10.2.0/lib');

        //Oracle����³
        // TNES�Ķ��Ѥ�������ɲ�
//        $conn = OCILogon( "bsp", "bsp", "bps" );
//        $conn = OCILogon( "bbbusert", "lbbbusert1", "D_oradb3d1" );

// Change TNES 2020/03/03 START
//        $conn = OCILogon( "PANDA1", "lpanda1_linux00", "new_panda" );
        $conn = oci_connect( "PANDA1", "lpanda1_linux00", "PANDA" );
// Change TNES 2020/03/03 END


        $errflg = cmOCIError( "", $sErrMsg );    //���׎���������

        return $errflg;

    }

    //***************************************************************
    // �ؿ�̾ �� cmOCILogoff
    // ����ǽ �� �Îގ����͎ގ����ؤ���³������
    // ������ ��
    // ������ �� $conn (in) :�Îގ�����³ID
    // ����� �� �ʤ�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCILogoff( $conn ) {

        //Oracle��³������

// Change TNES 2020/03/03 START
        //ocilogoff( $conn );
        oci_close( $conn );
// Change TNES 2020/03/03 END

    }

    //***************************************************************
    // �ؿ�̾ �� cmOCIExecuteSelect
    // ����ǽ �� ���ȷ�ñ��ӣѣ�ʸ��ȯ��
    //
    // ������ �� $conn (in) :�Îގ�����³ID
    //           $sSQL (in) :SQLʸ
    //           $rows (out):�쥳���ɿ�
    //           $results (out):�쥳��������
    //           $sErrMsg (out) :���׎��Ҏ���������
    // ����� �� true :����
    //          false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCIExecuteSelect( $conn,
                                 $sSQL,
                                 &$rows,
                                 &$results,
                                 &$sErrMsg ) {

        //SQLʸ����
// Change TNES 2020/03/03 START
        //$stmt = OCIParse( $conn, $sSQL );
        $stmt = oci_parse( $conn, $sSQL );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $conn, $sErrMsg );    //���׎���������
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement�β���
            oci_free_statement( $stmt );  //statement�β���
// Change TNES 2020/03/03 END
            return false;
        }

        //SQL�¹�
// Change TNES 2020/03/03 START
        //OCIExecute( $stmt );
        oci_execute( $stmt );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $stmt, $sErrMsg );    //���׎���������
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement�β���
            oci_free_statement( $stmt );  //statement�β���
// Change TNES 2020/03/03 END
            return false;
        }

        //�Îގ������ɹ�
// Change TNES 2020/03/03 START
        //$rows = OCIFetchStatement( $stmt, $results );
        $rows = oci_fetch_all( $stmt, $results );
// Change TNES 2020/03/03 END

        //statement�β���
// Change TNES 2020/03/03 START
        //OCIFreeStatement( $stmt );
        oci_free_statement( $stmt );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // �ؿ�̾ �� cmOCIExecuteUpdate
    // ����ǽ �� ������ñ��ӣѣ�ʸ��ȯ��
    //
    // ������ �� $conn (in) :�Îގ�����³ID
    //           $sSQL (in) :SQL
    //           $sErrMsg (out) :���׎��Ҏ���������
    //           $mode (in) :�ӣѣ�ȯ�ԤΎӎ��Ď�
    //                          OCI_DEFAULT           : ��ư���ߥåȤ��ʤ�
    //                          OCI_COMMIT_ON_SUCCESS : ��ư���ߥåȤ���
    // ����� �� true :����
    //           false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCIExecuteUpdate( $conn,
                                 $sSQL,
                                 &$sErrMsg,
                                 $mode = OCI_COMMIT_ON_SUCCESS ) {

        //SQLʸ����
// Change TNES 2020/03/03 START
        //$stmt = OCIParse( $conn, $sSQL );
        $stmt = oci_parse( $conn, $sSQL );
// Change TNES 2020/03/03 END
        $errflg = cmOCIError( $conn, $sErrMsg );    //���׎���������
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement�β���
            oci_free_statement( $stmt );  //statement�β���
// Change TNES 2020/03/03 END
            return false;
        }

        //SQL�¹�
// Change TNES 2020/03/03 START
        //OCIExecute( $stmt, $mode );   //��ư���ߥåȤ��ʤ�
        oci_execute( $stmt, $mode );   //��ư���ߥåȤ��ʤ�
// Change TNES 2020/03/03 END
        $errflg = cmOCIError( $stmt, $sErrMsg );    //���׎���������
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement�β���
            oci_free_statement( $stmt );  //statement�β���
// Change TNES 2020/03/03 END
            return false;
        }

        //statement�β���
// Change TNES 2020/03/03 START
        //OCIFreeStatement( $stmt );
        oci_free_statement( $stmt );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // �ؿ�̾ �� cmOCICommit
    // ����ǽ �� �ȥ�󥶥������򥳥ߥåȤ��ޤ�
    //
    // ������ �� $conn (in) :�Îގ�����³ID
    //           $sErrMsg (out) :���׎��Ҏ���������
    // ����� �� true :����
    //          false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCICommit( $conn,
                          $sErrMsg ) {

        //SQLʸ����
// Change TNES 2020/03/03 START
        //OCICommit( $conn );
        oci_commit( $conn );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $conn, $sErrMsg );    //���׎���������
        if ( $errflg === false ) {
            return false;
        }

        return true;

    }

    //***************************************************************
    // �ؿ�̾ �� cmOCIRollback
    // ����ǽ �� �ȥ�󥶥����������Хå����ޤ�
    //
    // ������ �� $conn (in) :�Îގ�����³ID
    // ����� �� true :����
    //          false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCIRollback( $conn ) {

        //SQLʸ����
// Change TNES 2020/03/03 START
        //@OCIRollback( $conn );
        @oci_rollback( $conn );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // �ؿ�̾ �� cmOCIError
    // ����ǽ �� Oracle�Ύ��׎��Ҏ��������ޤμ���
    //
    // ������ �� $connstmt (in) :�Îގ����͎ގ���ID
    //           $sErrMsg (out) :���׎��Ҏ���������
    // ����� �� true :����
    //           false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmOCIError( $connstmt = "",
                         &$sErrMsg ) {

        //���׎�����
        if ( $connstmt == "" ) {
// Change TNES 2020/03/03 START
            //$Err = OCIError();
            $Err = oci_error();
// Change TNES 2020/03/03 END
        } else {
// Change TNES 2020/03/03 START
            //$Err = OCIError( $connstmt );
            $Err = oci_error( $connstmt );
// Change TNES 2020/03/03 END
        }

        //���׎��Ҏ��������ޤμ���
        if ( is_array( $Err ) ) {
            list( $code, $message ) = explode( ":", $Err[ "message" ], 2 );
            //$sErrMsg = cmHtmlEntities( "\n�꥿���󥳡��ɡ�".$code."\n���ơ�".$message."\n" );
            $sErrMsg = cmHtmlEntities($code . $message . "\n" );
            return false;
        }

        return true;

    }


    //***************************************************************
    // �ؿ�̾ �� cmNullToString
    // ����ǽ �� null�����ʸ������Ѵ�
    //
    // ������ �� $val :���򤵤줿ʸ����
    // ����� �� Oracle��ʸ����
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmNullToString( $val ) {

        if ( $val === null ) {
            return "";
        } else {
            return $val;
        }

    }

    //***************************************************************
    // �ؿ�̾ �� cmToOraString
    // ����ǽ �� Oracle��ʸ������Ѵ�
    //
    // ������ �� $val :���򤵤줿ʸ����
    // ����� �� Oracle��ʸ����
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmToOraString( $val ) {
        if ( $val === "" ) {
            return "null";
        } else {
            return "'".$val."'";
        }

    }

    //***************************************************************
    // �ؿ�̾ : cmHtmlEntities
    //
    // ��ǽ   : Ŭ�Ѳ�ǽ��ʸ����HTML����ƥ��ƥ����Ѵ�����
    // ����   : $sSrc :�о�ʸ����
    // ����� : �Ѵ����ʸ����
    // ������ : 2003/10/13 NECSI
    //***************************************************************
    function cmHtmlEntities( $sSrc ){

        //ʸ������Ѵ�
        $sResult = str_replace( "\"", "&quot;", $sSrc );
        $sResult = str_replace( "<", "&lt;", $sResult );
        $sResult = str_replace( ">", "&gt;", $sResult );

        return( $sResult );

    }

    //***************************************************************
    // �ؿ�̾ �� cmCreatexml
    // ����ǽ �� XMLʸ�������
    //
    // ������ ��&$sxml_string  XMLʸ����        string
    //          $axml_key      XML��Keywords    array
    //          $axml_value    XML��Attributes  array
    //          $dtotalRows    $axml_value��lenth       number
    // ����� ��
    //
    // ������ �� 2005/01/11 �⹿��
    //***************************************************************
    function cmCreatexml(&$sxml_string,$axml_key,$axml_value,$dtotalRows){

        // XMLKeywords�Ŀ��μ���
        $dkey_length = count($axml_key);
        // $sxml_string��Length�μ���
// Change TNES 2020/03/03 START
        //$dxml_length = count($sxml_string);
        $dxml_length = strlen($sxml_string);
// Change TNES 2020/03/03 END
        
        // $dxml_length == 0�� XMLversion������ɲ�

// Delete TNES 2020/03/03 START
//        if($dxml_length == 0){
//            $sxml_string .="<?xml version='1.0' encoding='UTF-8'?";
//            $sxml_string .=">";
//        }
// Delete TNES 2020/03/03 END

        // ��XML node ���ɲ�
        $sxml_string .="<datapacket";
        // IF $dtotalRows > 0 $axml_value bu wei kong "xmlresult='true'"���ɲá�else "xmlresult='false'"���ɲ�
        if($dtotalRows > 0){
            $sxml_string .=" xmlresult='true'";
        }
        else{
            $sxml_string .=" xmlresult='false'";
        }
        $sxml_string .=">";

        //
        $drow_no = 0;
        // XML Childs ���ɲ�
        while($drow_no < $dtotalRows){
            // row ���ɲ�
            $sxml_string .= "<row ";
            // row ��Ŷ��
            for($dline_no = 0; $dline_no < $dkey_length; $dline_no++){
                // XMLKeyword ���ɲ�
                $sxml_string .= $axml_key[$dline_no]."=";
                // XMLKeyword �μ���
                $scurrentkey  = $axml_key[$dline_no];
                $sxml_string .= "'";
                // XML��Attributes ���ɲ�
                $sxml_string .= cmAddChar($axml_value[$scurrentkey][$drow_no]);
                $sxml_string .= "' ";

            }
            // row�ɲô�λ
            $sxml_string .= "/>";
            $drow_no++;
        }
        // XML node �ɲô�λ
        $sxml_string .= "</datapacket>";

    }
    //***************************************************************
    // �ؿ�̾ �� cmRenkeiSyori
    // ����ǽ �� Ϣ�Ȥν�����Ԥ�
    //
    // ������ �� $sReqData (in)        :Ϣ�ȥǡ���
    //           $sErrMsg (out)       :���׎����Ҏ���������
    //           $sRenkeiMethod (in)  :Ϣ������
    // ����� �� true   :  Ϣ�ȣϣ�
    //          false  : Ϣ�ȣΣ�
    // ������ �� 2003/09/23 NECSL
    //***************************************************************
    function cmRenkeiSyori( $sReqData, &$sErrMsg, $sRenkeiMethod, &$aKeyword ) {

//ONLY FOR TEST
//return true;
//END ONLY FOR TEST

//////////////////////////////////////////////////////////////////////////////
//                            CAUTION!!!!                                   //
//        �ƥ����Ѥ˥ƥ�ݥ��ե���������ƺ�����Ƥ��ޤ���              //
//////////////////////////////////////////////////////////////////////////////

        //ASP_FunctionCAll �ѥ�᡼���ե�����̾
        // update by Y.Abe 2006/05/23 pid�б� Start
        //$sTmpFilename = CM_TMP_DIR . "/request" . date("YmdHis") . '.txt';
        $sTmpFilename = CM_TMP_DIR . "/request" . date("YmdHis") . posix_getpid() . '.txt';
        // update by Y.Abe 2006/05/23 pid�б� End

        $ASP_FUNC = CM_ASP_FUNC . " " . $sRenkeiMethod ." ";

        //ASP_FunctionCAll �ѥ�᡼���ե��������
        $fpASPFunc  = fopen($sTmpFilename, "w");
        if(!$fpASPFunc) {

            $sErrMsg = "���ץꥱ������󥨥顼��ȯ�����ޤ�����tmp�ե����륪���ץ�ˡ������ƥ�����Ԥ�Ϣ���Ƥ���������";
            return false;
        }//end if

        $bRtn = fwrite($fpASPFunc, $sReqData);
        if( $bRtn == -1 ) {

            fclose($fpASPFunc);

            //TMP�ե�������
            //unlink($sTmpFilename);

            $sErrMsg = "���ץꥱ������󥨥顼��ȯ�����ޤ�����tmp�ե�����񤭎����ߡˡ������ƥ�����Ԥ�Ϣ���Ƥ���������";
            return false;
        }//end if

        if( !fclose($fpASPFunc) ) {

            //TMP�ե�������
            //unlink($sTmpFilename);

            $sErrMsg = "���ץꥱ������󥨥顼��ȯ�����ޤ�����tmp�ե����륯�����ˡ������ƥ�����Ԥ�Ϣ���Ƥ���������";
            return false;
        }//end if

//UPDATE ABE 050523 START
        //ASP_FunctionCAll �ƤӽФ�
        //$fpPipe = popen("$ASP_FUNC < $sTmpFilename", "r");
        //if( !$fpPipe ) {

            //TMP�ե�������
            //unlink($sTmpFilename);

        //    $sErrMsg = "���ץꥱ������󥨥顼��ȯ�����ޤ�����ASP_FUNCTION_CALL�ƤӽФ��ˡ������ƥ�����Ԥ�Ϣ���Ƥ���������";
        //    return false;
        //}//end if
//UPDATE ABE 050523 END

        // update by Y.Abe 2006/05/23 pid�б� Start
        //$sRetFilename = CM_TMP_DIR . "/return" . date("YmdHis") . '.txt';
        $sRetFilename = CM_TMP_DIR . "/return" . date("YmdHis") . posix_getpid() . '.txt';
        // update by Y.Abe 2006/05/23 pid�б� End

        $asp_cmd = system("$ASP_FUNC < $sTmpFilename > $sRetFilename");
        $fpPipe = fopen("$sRetFilename", "r");

        if( !$fpPipe ) {
            //TMP�ե�������
            //unlink($sTmpFilename);
            $sErrMsg = "���ץꥱ������󥨥顼��ȯ�����ޤ�����ASP_FUNCTION_CALL�ƤӽФ��ˡ������ƥ�����Ԥ�Ϣ���Ƥ���������";
            return false;
        }//end if


        //ASP_FunctionCAll ��̼���
        while( !feof($fpPipe) ) {

          $WK = chop(fgets($fpPipe));
          list($a, $b) = explode("=", $WK);
          $aKeyword[$a] = $b;
        }

        $bRtn = pclose($fpPipe);

        //TMP�ե�������
        //if( !unlink($sTmpFilename) ) {

        //    $sErrMsg = "���ץꥱ������󥨥顼��ȯ�����ޤ�����TMP�ե��������ˡ������ƥ�����Ԥ�Ϣ���Ƥ���������";
        //    return false;
        //}//end if

        return true;
    }

    //***************************************************************
    // �ؿ�̾ �� cmGetErrorInfo
    // ����ǽ �� ��å���������
    // IN     �� $sErrMsg          ��å�����
    // OUT    �� XMLʸ����
    // Create �� 2005/01/19 ������ V0.0
    //***************************************************************
    function cmGetErrorInfo($sErrMsg) {
        $aXml[0]= "ERRFLG";
        $aXml[1]= "ERRMSG";
        $oResults["ERRFLG"][0] = "Failure";
        $oResults["ERRMSG"][0] = $sErrMsg;
        $dRows = 1;

        cmCreatexml($sXml, $aXml, $oResults, $dRows);
        cmEcho($sXml);
    }

    //***************************************************************
    // �ؿ�̾ �� cmSendMail
    // ����ǽ �� �᡼�����դ���
    //
    // ������ ��$sMailSbt    (in)    :  ��������
    //          $sMailTo             : ������
    //          $sMailSubject(in)    : ��̾
    //          $sMailText (in)      :  ��å���������
    //
    // ����� �� true   :  �ϣ�
    //          false  : �Σ�
    // ������ �� 2005/03/01 ������
    //***************************************************************
    function cmSendMail( $sMailSbt, $sMailTo, $oResultEmail){

// Change TNES 2020/03/03 START
        //if ( ereg( "^[^@ ]+@([a-zA-Z0-9-]+.)+([a-zA-Z0-9-]{2})$",
        if ( preg_match( "/^[^@ ]+@([a-zA-Z0-9-]+.)+([a-zA-Z0-9-]{2})$/",
// Change TNES 2020/03/03 END
            $sMailTo )== false ){
            $sMailTo="";
        }

        if ( strlen( trim( cmNullToString( $sMailSbt ) ) )<= 0 ) {
            return false;
        }
        /*Insert by ĥ��ձ 2005/04/19 Start*/
        $sMyURL = $oResultEmail["REQ_URL"];
        $dMyIndex = strpos($sMyURL,"?");
        $sMystr2 = substr($sMyURL,$dMyIndex+1);

        /*Update by ĥ��ձ 2005/04/19 Start*/
        //if (strpos($sMystr2,"?") != -1) {
        if (strpos($sMystr2,"?") != "") {
        /*Update by ĥ��ձ 2005/04/19 End*/
            $sMystr1 = substr($sMyURL,0,$dMyIndex);
            $sMystr3 = strstr($sMystr2,"?");
            $oResultEmail["REQ_URL"] = $sMystr1.$sMystr3;
        }
        /*Insert by ĥ��ձ 2005/04/19 End*/

        //Insert by ������ 2005/05/12 Start
        switch($sMailSbt) {
            case "5.1.3.5":
            case "5.1.3.7":
            case "5.1.3.8":
            case "5.1.3.9":
            case "5.1.3.10":
            case "5.1.3.12":
            case "5.1.3.13":
// UPDATE MASUKO 050524 START
            case "5.1.3.6":
            case "5.1.3.11":
// UPDATE MASUKO 050524 END
                //�ǡ����١����ؤ���³
                if ( !cmOCILogon( $conn, $sErrMsg ) ) {
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if
                $sSql  = " SELECT ";
//UPDATE MASUKO 050523 START
//              $sSql .= "        TO_CHAR(REQUEST_DATE, 'YYYY/MM/MM') REQUEST_DATE ";
                $sSql .= "        TO_CHAR(REQUEST_DATE, 'YYYY/MM/DD') REQUEST_DATE ";
//UPDATE MASUKO 050523 END
                $sSql .= " FROM ";
                $sSql .= "        IDM_REQUEST_TBL ";
                $sSql .= " WHERE ";
                $sSql .= "        INTERNAL_ID = " . cmToOraString($oResultEmail["INTERNAL_ID"]);
                if ( !cmOCIExecuteSelect( $conn, $sSql, $dRows, $oResults, $sErrMsg ) ) {
                    //�ǡ����١����ؤ���³������
                    cmOCILogoff( $conn );
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if
                if ($dRows > 0) {
                    $oResultEmail["REQUEST_DATE"] = $oResults["REQUEST_DATE"][0];
                }
                break;
            default:
                break;
        }
        //Insert by ������ 2005/05/12 End
//Insert by ������ 2005/05/13 Start
        // add by Y.Abe 2005/11/28 Start
        $sShinseiSbt = "";
        // add by Y.Abe 2005/11/28 End
        if ($sMailSbt != "5.1.3.14") {
            switch($oResultEmail["SHINSEI_SBT"]) {
                case "NEWID":
                    $oResultEmail["SHINSEI_SBT"] = "BIGLOBE_ID����";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "NEWID";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "SPNEWID":
                    $oResultEmail["SHINSEI_SBT"] = "�ü�BIGLOBE_ID����";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "SPNEWID";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "UPDDEL":
                    $oResultEmail["SHINSEI_SBT"] = "��¸ID�ѹ������";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "UPDDEL";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "NEWAUTH":
                    $oResultEmail["SHINSEI_SBT"] = "ô����ID�����¿���";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "NEWAUTH";
                    // add by Y.Abe 2005/11/28 End
                    break;
                default :
                    break;
            }
        }
//Insert by ������ 2005/05/13 End

        switch ($sMailSbt) {
            //5.1.3.3   ��ǧ����᡼��ƥ�ץ졼��
            case "5.1.3.3":
                $handle = fopen(CM_EMAIL_DIR . "/syoninirai.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by ������ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by ������ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by ������ 2005/05/16 Start
                // update by Y.Abe 2006/01/19 Start
                $sOld = array('$PRIORITY', '$INTERNAL_ID', '$SYONIN_EMAIL',
                              '$SHINSEI_EMAIL' , '$SYONIN_NAME', '$SHINSEI_NAME',
                              '$SHINSEI_SBT', '$REQ_NUM', '$REQ_URL', '$KEIKAKU_INTERVIEW',
                              '$KEIKAKU_SBJ');
                $sNew = array($oResultEmail["PRIORITY"], $oResultEmail["INTERNAL_ID"],
                              $oResultEmail["SYONIN_EMAIL"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SYONIN_NAME"], $oResultEmail["SHINSEI_NAME"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"],
                              $oResultEmail["REQ_URL"],$oResultEmail["KEIKAKU_INTERVIEW"],
                              $oResultEmail["KEIKAKU_SBJ"]);
                //$sOld = array('$PRIORITY', '$INTERNAL_ID', '$SYONIN_EMAIL',
                //              '$SHINSEI_EMAIL' , '$SYONIN_NAME', '$SHINSEI_NAME',
                //              '$SHINSEI_SBT', '$REQ_NUM', '$REQ_URL', '$KEIKAKU_INTERVIEW');
                //$sNew = array($oResultEmail["PRIORITY"], $oResultEmail["INTERNAL_ID"],
                //              $oResultEmail["SYONIN_EMAIL"], $oResultEmail["SHINSEI_EMAIL"],
                //              $oResultEmail["SYONIN_NAME"], $oResultEmail["SHINSEI_NAME"],
                //              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"],
                //              $oResultEmail["REQ_URL"],$oResultEmail["KEIKAKU_INTERVIEW"]);
                // update by Y.Abe 2006/01/19 End
/*                $sOld = array("$", "PRIORITY", "$", "INTERNAL_ID", "$", "SYONIN_EMAIL",
                              "$", "SHINSEI_EMAIL" , "$", "SYONIN_NAME", "$", "SHINSEI_NAME",
                              "$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["PRIORITY"], "", $oResultEmail["INTERNAL_ID"],
                              "", $oResultEmail["SYONIN_EMAIL"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SYONIN_NAME"], "", $oResultEmail["SHINSEI_NAME"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"],
                              "", $oResultEmail["REQ_URL"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.4   �������¾�ǧ����᡼��ƥ�ץ졼��
            case "5.1.3.4":
                $handle = fopen(CM_EMAIL_DIR . "/kobetusyoninirai.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by ������ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by ������ 2005/03/21 End
                $sNew = array("index.php");

                // add by Y.Abe 2005/11/11 Start
                //�ǡ����١����ؤ���³
                if ( !cmOCILogon( $conn, $sErrMsg ) ) {
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if

                // ��ǧ�оݤθ��¥ꥹ�ȼ�����SQL
                $sSql  = " SELECT ";
                $sSql .= "  AUTH.AUTHORITY_CD        AUTHORITY_CD, ";
                $sSql .= "  AUTH.AUTHORITY_NAME      AUTHORITY_NAME ";
                $sSql .= " FROM ";
                $sSql .= "  IDM_AUTH_DATA_TBL DATA, ";
                $sSql .= "  IDM_AUTHORITY_TBL AUTH ";
                $sSql .= " WHERE ";
                $sSql .= "  DATA.INTERNAL_ID = " . cmToOraString($oResultEmail["INTERNAL_ID"]) . " AND ";
                $sSql .= "  DATA.SEKININ_DATE   IS NULL           AND ";
                $sSql .= "  DATA.SEKININ_SYONIN IS NOT NULL       AND ";
                $sSql .= "  DATA.AUTHORITY_CD = AUTH.AUTHORITY_CD AND ";
                $sSql .= "  NVL(DATA.SYORI_KBN_PTN, 'NULL') = NVL(AUTH.SYORI_KBN_PTN, 'NULL') AND ";
                // update by Y.Abe 2005/12/08 Start
                //$sSql .= "  ( ";
                //$sSql .= "    ( AUTH.SEKININ1_SYAIN_NO = " . cmToOraString($oResultEmail["SYAIN_NO"]) . " AND AUTH.SEKININ1_KENMU_CD = " . cmToOraString($oResultEmail["KENMU_CD"]) . " ) OR ";
                //$sSql .= "    ( AUTH.SEKININ2_SYAIN_NO = " . cmToOraString($oResultEmail["SYAIN_NO"]) . " AND AUTH.SEKININ2_KENMU_CD = " . cmToOraString($oResultEmail["KENMU_CD"]) . " ) ";
                //$sSql .= "  ) ";
                $sSql .= "  AUTH.SEKININ1_SYAIN_NO = " . cmToOraString($oResultEmail["SYAIN_NO"]) . " AND AUTH.SEKININ1_KENMU_CD = " . cmToOraString($oResultEmail["KENMU_CD"]) . " ";
                // update by Y.Abe 2005/12/08 End
                $sSql .= " ORDER BY ";
                $sSql .= "  AUTH.AUTHORITY_NAME ";

                // SQL��ȯ��
                if ( !cmOCIExecuteSelect( $conn, $sSql, $dRows, $oResults, $sErrMsg ) ) {
                    //�ǡ����١����ؤ���³������
                    cmOCILogoff( $conn );
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if

                // �ꥹ�Ȥ����
                $sAuthList = "";
                for ( $i = 0; $i < $dRows; $i++ ) {
                    $sAuthList .= "��".$oResults["AUTHORITY_NAME"][$i] . "
";
                }
                // add by Y.Abe 2005/11/11 End

                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by ������ 2005/05/16 Start
                // update by Y.Abe 2005/11/11 Start
                /*
                $sOld = array('$PRIORITY', '$INTERNAL_ID', '$KOBETU1_EMAIL',
                              '$KOBETU2_EMAIL' , '$SHINSEI_EMAIL', '$KOBETU1_NAME',
                              '$SHINSEI_NAME', '$SHINSEI_SBT', '$REQ_NUM', '$REQ_URL');
                $sNew = array($oResultEmail["PRIORITY"], $oResultEmail["INTERNAL_ID"],
                              $oResultEmail["KOBETU1_EMAIL"], $oResultEmail["KOBETU2_EMAIL"],
                              $oResultEmail["SHINSEI_EMAIL"], $oResultEmail["KOBETU1_NAME"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["SHINSEI_SBT"],
                              $oResultEmail["REQ_NUM"], $oResultEmail["REQ_URL"]);*/
                $sOld = array('$PRIORITY', '$INTERNAL_ID', '$KOBETU1_EMAIL',
                              '$KOBETU2_EMAIL' , '$SHINSEI_EMAIL', '$KOBETU1_NAME',
                              '$SHINSEI_NAME', '$SHINSEI_SBT', '$REQ_NUM', '$REQ_URL', '$AUTH_LIST');
                $sNew = array($oResultEmail["PRIORITY"], $oResultEmail["INTERNAL_ID"],
                              $oResultEmail["KOBETU1_EMAIL"], $oResultEmail["KOBETU2_EMAIL"],
                              $oResultEmail["SHINSEI_EMAIL"], $oResultEmail["KOBETU1_NAME"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["SHINSEI_SBT"],
                              $oResultEmail["REQ_NUM"], $oResultEmail["REQ_URL"], $sAuthList);
                // update by Y.Abe 2005/11/11 End
/*                $sOld = array("$", "PRIORITY", "$", "INTERNAL_ID", "$", "KOBETU1_EMAIL",
                              "$", "KOBETU2_EMAIL" , "$", "SHINSEI_EMAIL", "$", "KOBETU1_NAME",
                              "$", "SHINSEI_NAME", "$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["PRIORITY"], "", $oResultEmail["INTERNAL_ID"],
                              "", $oResultEmail["KOBETU1_EMAIL"], "", $oResultEmail["KOBETU2_EMAIL"],
                              "", $oResultEmail["SHINSEI_EMAIL"], "", $oResultEmail["KOBETU1_NAME"],
                              "", $oResultEmail["SHINSEI_NAME"], "",$oResultEmail["SHINSEI_SBT"],
                              "", $oResultEmail["REQ_NUM"], "", $oResultEmail["REQ_URL"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.5   ��ǧ���Υ᡼��ƥ�ץ졼��
            case "5.1.3.5":
                $handle = fopen(CM_EMAIL_DIR . "/hinin.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by ������ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by ������ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by ������ 2005/05/16 Start
                $sOld = array('$INTERNAL_ID', '$SHINSEI_EMAIL', '$SYONIN_EMAIL',
                              '$SHINSEI_NAME', '$REQUEST_DATE',
                              '$SHINSEI_SBT', '$REQ_NUM', '$SYONIN_NAME',
                              '$DENIAL_REASON', '$REQ_URL');
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SYONIN_EMAIL"], $oResultEmail["SHINSEI_NAME"],
                              $oResultEmail["REQUEST_DATE"], $oResultEmail["SHINSEI_SBT"],
                              $oResultEmail["REQ_NUM"], $oResultEmail["SYONIN_NAME"],
                              $oResultEmail["DENIAL_REASON"], $oResultEmail["REQ_URL"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SHINSEI_EMAIL",
                              "$", "SYONIN_EMAIL", "$", "SHINSEI_NAME", "$", "REQUEST_DATE",
                              //UPDATE by ���� 2005/04/21 START
                              //"$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SYONIN_NAME ",
                              "$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SYONIN_NAME",
                              //UPDATE by ���� 2005/04/21 END
                              "$", "DENIAL_REASON", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SYONIN_EMAIL"], "", $oResultEmail["SHINSEI_NAME"],
                              "", $oResultEmail["REQUEST_DATE"], "", $oResultEmail["SHINSEI_SBT"],
                              //UPDATE by ���� 2005/04/21 START
                              //"", $oResultEmail["REQ_NUM"], "", $oResultEmail["SYONIN_NAME "],
                              "", $oResultEmail["REQ_NUM"], "", $oResultEmail["SYONIN_NAME"],
                              //UPDATE by ���� 2005/04/21 END
                              "", $oResultEmail["DENIAL_REASON"], "", $oResultEmail["REQ_URL"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.6   ��Ծ�ǧ���᡼��ƥ�ץ졼��
            case "5.1.3.6":
                $handle = fopen(CM_EMAIL_DIR . "/daikouhoukoku.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by ������ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by ������ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by ������ 2005/05/16 Start
                $sOld = array('$PRIORITY', '$INTERNAL_ID', '$SYONIN_EMAIL',
                              '$SHINSEI_EMAIL', '$DAIKOU_EMAIL', '$SYONIN_NAME',
                              '$SHINSEI_NAME', '$SHINSEI_SBT', '$REQ_NUM',
//UPDATE MASUKO 050524 START
                            //'$DAIKOU_NAME', '$REQ_URL');
                              '$DAIKOU_NAME', '$REQ_URL', '$REQUEST_DATE');
//UPDATE MASUKO 050524 END
                $sNew = array($oResultEmail["PRIORITY"], $oResultEmail["INTERNAL_ID"],
                              $oResultEmail["SYONIN_EMAIL"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["DAIKOU_EMAIL"], $oResultEmail["SYONIN_NAME"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["SHINSEI_SBT"],
                              $oResultEmail["REQ_NUM"], $oResultEmail["DAIKOU_NAME"],
//UPDATE MASUKO 050524 START
                            //$oResultEmail["REQ_URL"]);
                              $oResultEmail["REQ_URL"], $oResultEmail["REQUEST_DATE"]);
//UPDATE MASUKO 050524 END
/*                $sOld = array("$", "PRIORITY", "$", "INTERNAL_ID", "$", "SYONIN_EMAIL",
                              "$", "SHINSEI_EMAIL", "$", "DAIKOU_EMAIL", "$", "SYONIN_NAME",
                              "$", "SHINSEI_NAME", "$", "SHINSEI_SBT", "$", "REQ_NUM",
                              "$", "DAIKOU_NAME", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["PRIORITY"], "", $oResultEmail["INTERNAL_ID"],
                              "", $oResultEmail["SYONIN_EMAIL"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["DAIKOU_EMAIL"], "", $oResultEmail["SYONIN_NAME"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["SHINSEI_SBT"],
                              "", $oResultEmail["REQ_NUM"], "", $oResultEmail["DAIKOU_NAME"],
                              "", $oResultEmail["REQ_URL"]);*/
//Update by ������ 2005/05/16 Start
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.7   �貼�����Υ᡼��ƥ�ץ졼��
            case "5.1.3.7":
                $handle = fopen(CM_EMAIL_DIR . "/torisage.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
//UPDATE MASUKO 050524 START
              //$sOld = array('$INTERNAL_ID', '$SYONIN_EMAIL',
                $sOld = array('$INTERNAL_ID', '$SYONIN_EMAIL', '$SHINSEI_NAME',
//UPDATE MASUKO 050524 END
                              '$SHINSEI_EMAIL', '$COMP_SYONIN_EMAIL_LIST', '$SYONIN_NAME',
                              '$REQUEST_DATE', '$SHINSEI_SBT', '$REQ_NUM');
//UPDATE MASUKO 050524 START
              //$sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SYONIN_EMAIL"],
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SYONIN_EMAIL"], $oResultEmail["SHINSEI_NAME"],
//UPDATE MASUKO 050524 END
                              $oResultEmail["SHINSEI_EMAIL"], $oResultEmail["COMP_SYONIN_EMAIL_LIST"],
                              $oResultEmail["SYONIN_NAME"], $oResultEmail["REQUEST_DATE"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SYONIN_EMAIL",
                              "$", "SHINSEI_EMAIL" , "$", "COMP_SYONIN_EMAIL_LIST", "$", "SYONIN_NAME",
                              "$", "REQUEST_DATE", "$", "SHINSEI_SBT", "$", "REQ_NUM");
                $sNew = array("", $oResultEmail["INTERNAL_ID"],
                              "", $oResultEmail["SYONIN_EMAIL"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["COMP_SYONIN_EMAIL_LIST"],
                              "", $oResultEmail["SYONIN_NAME"], "", $oResultEmail["REQUEST_DATE"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.8   �������Υ᡼��ƥ�ץ졼��
            case "5.1.3.8":
                $handle = fopen(CM_EMAIL_DIR . "/mensetu.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
                $sOld = array('$INTERNAL_ID', '$SHINSEI_EMAIL', '$SHINSEI_NAME',
                              '$REQUEST_DATE', '$SHINSEI_SBT', '$REQ_NUM');
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["REQUEST_DATE"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SHINSEI_EMAIL",
                              "$", "SHINSEI_NAME" , "$", "REQUEST_DATE", "$", "SHINSEI_SBT",
                              "$", "REQ_NUM");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["REQUEST_DATE"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.9   ��Ͽ��λ���Υ᡼��ƥ�ץ졼��
            case "5.1.3.9":
                // update by Y.Abe 2005/11/28 Start
                if ( $sShinseiSbt == "UPDDEL" ) {
                    $handle = fopen(CM_EMAIL_DIR . "/kanryou.tmpl","r");
                } else {
                    $handle = fopen(CM_EMAIL_DIR . "/kanryou2.tmpl","r");
                }
                // update by Y.Abe 2005/11/28 End
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
                $sOld = array('$INTERNAL_ID', '$SHINSEI_EMAIL', '$SEKININ_EMAIL_LIST',
                              '$SHINSEI_NAME', '$REQUEST_DATE',
                              '$SHINSEI_SBT', '$REQ_NUM');
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SEKININ_EMAIL_LIST"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["REQUEST_DATE"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SHINSEI_EMAIL",
                              "$", "SEKININ_EMAIL_LIST" , "$", "SHINSEI_NAME", "$", "REQUEST_DATE",
                              "$", "SHINSEI_SBT", "$", "REQ_NUM");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SEKININ_EMAIL_LIST"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["REQUEST_DATE"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.10   ��Ͽ���顼���Υ᡼��ƥ�ץ졼��
            case "5.1.3.10":
                $handle = fopen(CM_EMAIL_DIR . "/error.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
                $sOld = array('$INTERNAL_ID', '$SHINSEI_EMAIL', '$SHINSEI_NAME' ,
                              '$REQUEST_DATE', '$SHINSEI_SBT', '$REQ_NUM');
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["REQUEST_DATE"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SHINSEI_EMAIL",
                              "$", "SHINSEI_NAME" , "$", "REQUEST_DATE", "$", "SHINSEI_SBT",
                              "$", "REQ_NUM");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["REQUEST_DATE"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.11   ������롼�פؤν�������᡼��ƥ�ץ졼��
            case "5.1.3.11":
                $handle = fopen(CM_EMAIL_DIR . "/bcs.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by ������ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by ������ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by ������ 2005/05/16 Start
                $sOld = array('$PRIORITY', '$INTERNAL_ID', '$SHINSEI_NAME',
                              '$SHINSEI_SBT', '$REQ_NUM', '$SHINSEI_SECTION1',
                              '$SHINSEI_SECTION2', '$SHINSEI_NAME', '$SHINSEI_TEL',
//UPDATE MASUKO 050524 START
                            //'$SHINSEI_EMAIL', '$REQ_URL');
                              '$SHINSEI_EMAIL', '$REQ_URL', '$REQUEST_DATE');
//UPDATE MASUKO 050524 END
                $sNew = array($oResultEmail["PRIORITY"], $oResultEmail["INTERNAL_ID"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["SHINSEI_SBT"],
                              $oResultEmail["REQ_NUM"], $oResultEmail["SHINSEI_SECTION1"],
                              $oResultEmail["SHINSEI_SECTION2"], $oResultEmail["SHINSEI_NAME"],
                              $oResultEmail["SHINSEI_TEL"], $oResultEmail["SHINSEI_EMAIL"],
//UPDATE MASUKO 050524 START
                            //$oResultEmail["REQ_URL"]);
                              $oResultEmail["REQ_URL"], $oResultEmail["REQUEST_DATE"]);
//UPDATE MASUKO 050524 END
/*                $sOld = array("$", "PRIORITY", "$", "INTERNAL_ID", "$", "SHINSEI_NAME",
                              "$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SHINSEI_SECTION1",
                              "$", "SHINSEI_SECTION2", "$", "SHINSEI_NAME", "$", "SHINSEI_TEL",
                              "$", "SHINSEI_EMAIL", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["PRIORITY"], "", $oResultEmail["INTERNAL_ID"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["SHINSEI_SBT"],
                              "", $oResultEmail["REQ_NUM"], "", $oResultEmail["SHINSEI_SECTION1"],
                              "", $oResultEmail["SHINSEI_SECTION2"], "", $oResultEmail["SHINSEI_NAME"],
                              "", $oResultEmail["SHINSEI_TEL"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["REQ_URL"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.12   �����å����NG���Υ᡼���̵��ID������
            case "5.1.3.12":
                $handle = fopen(CM_EMAIL_DIR . "/csv_err.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
                $sOld = array('$INTERNAL_ID', '$SHINSEI_EMAIL', '$SHINSEI_NAME',
                              '$REQUEST_DATE', '$SHINSEI_SBT', '$REQ_NUM', '$CSV_IDINFO_ERR');
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["REQUEST_DATE"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"],
                              $oResultEmail["CSV_IDINFO_ERR"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SHINSEI_EMAIL",
                              "$", "SHINSEI_NAME" , "$", "REQUEST_DATE", "$", "SHINSEI_SBT",
                              "$", "REQ_NUM", "$", "CSV_IDINFO_ERR");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["REQUEST_DATE"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"],
                              "", $oResultEmail["CSV_IDINFO_ERR"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.13   �����å����NG���Υ᡼���̵��ID�����ʳ���
            case "5.1.3.13":
                //$handle = fopen(CM_EMAIL_DIR , "/csv_tantou_err.tmpl","r");
                $handle = fopen(CM_EMAIL_DIR . "/csv_tantou_err.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
                $sOld = array('$INTERNAL_ID', '$SHINSEI_EMAIL', '$SHINSEI_NAME',
                              '$REQUEST_DATE', '$SHINSEI_SBT',
                              '$REQ_NUM', '$CSV_IDINFO_ERR', '$CSV_AUTH_ERR');
                $sNew = array($oResultEmail["INTERNAL_ID"], $oResultEmail["SHINSEI_EMAIL"],
                              $oResultEmail["SHINSEI_NAME"], $oResultEmail["REQUEST_DATE"],
                              $oResultEmail["SHINSEI_SBT"], $oResultEmail["REQ_NUM"],
                              $oResultEmail["CSV_IDINFO_ERR"], $oResultEmail["CSV_AUTH_ERR"]);
/*                $sOld = array("$", "INTERNAL_ID", "$", "SHINSEI_EMAIL",
                              "$", "SHINSEI_NAME" , "$", "REQUEST_DATE", "$", "SHINSEI_SBT",
                              "$", "REQ_NUM", "$", "CSV_IDINFO_ERR", "$", "CSV_AUTH_ERR");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SHINSEI_NAME"], "", $oResultEmail["REQUEST_DATE"],
                              "", $oResultEmail["SHINSEI_SBT"], "", $oResultEmail["REQ_NUM"],
                              "", $oResultEmail["CSV_IDINFO_ERR"], "", $oResultEmail["CSV_AUTH_ERR"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.14   �����Ը������顼��᡼��
            case "5.1.3.14":
                $handle = fopen(CM_EMAIL_DIR . "/systemerr.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by ������ 2005/05/16 Start
                $sOld = array('$ERR_MSG');
                $sNew = array($oResultEmail["ERR_MSG"]);
/*                $sOld = array("$", "ERR_MSG");
                $sNew = array("", $oResultEmail["ERR_MSG"]);*/
//Update by ������ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            default :
                break;
        }

/*
$fp = fopen("mail.log","w");
fwrite($fp, $sEmailText);
fclose($fp);
*/

        //--ʸ�ܳʼ�
        if ( $sEmailText != "" ){
            $sEmailText = mb_convert_encoding($sEmailText, "JIS",  "EUC_JP");
            $pp = popen("/usr/lib/sendmail -t -f ".SYSTEM_MAIL, "w");
            fwrite($pp, $sEmailText);
            pclose($pp);
        }

        return false;
    }

    //***************************************************************
    // �ؿ�̾ �� cmEcho
    // ����ǽ �� XMLʸ�����Ѵ�����
    //
    // ������ ��$sxml_string  XMLʸ����        string
    // ����� ���ʤ�
    //
    // ������ �� 2005/02/16�⹿��
    //***************************************************************
    function cmEcho($sxml_string){
        //XMLʸ�����Ѵ�
// Change TNES 2020/03/03 START
        $sxml_tag  ="<?xml version='1.0' encoding='Shift_JIS'?";
        $sxml_tag .=">";
        $sxml_tag .= "<item>";
        $sxml_tag .= $sxml_string;
        $sxml_tag .= "</item>"; 
        $sxml_tag = mb_convert_encoding($sxml_tag,'SJIS'); 
        echo($sxml_tag);
//        $sxml_string = mb_convert_encoding($sxml_string,'SJIS'); 
//        echo($sxml_string);
// Change TNES 2020/03/03 END
    }

    //***************************************************************
    // �ؿ�̾ �� cmReplaceMsg
    // ����ǽ �� XMLʸ�����Ѵ�����
    //
    // ������ ��$sErrMsg     XMLʸ����        string
    //          $sStr
    // ����� ����å�����
    //
    // ������ �� 2005/03/02 ������
    //***************************************************************
    function cmReplaceMsg($sErrMsg, $sStr) {
        $sOld = array("��");
        $sNew = array($sStr);
        $sErrMsg = str_replace($sOld, $sNew, $sErrMsg);
        return $sErrMsg;
    }

    //***************************************************************
    // �ؿ�̾ ��cmWriteAccessroguDb
    // ����ǽ ����������������Ͽ
    // ������ ��$sDBName             :�оݥơ��֥�ɣ�
    //          $sUserId             :��Ͽ�ԡ������ԡ������
    //          $sOraErrMsg          :Oracle�Υ꥿�����å�����
    //          $strUserSql          :SQL��ʸ����
    // ����� ���ʤ�
    // ������ ��2005/03/23  ������
    //***************************************************************
    function cmWriteAccessroguDb( $sDBName, $sUserId, $sOraErrMsg, $strUserSql, $conn ) {

        //��§ʸ�����Ѵ�
        $sChgUserSql = mb_ereg_replace("'", "��", $strUserSql);

        if ( strlen( $sChgUserSql ) > 2560 ) {
            $sFinalUserSql = substr($sChgUserSql, 0, 2558);
        } else {
            $sFinalUserSql = $sChgUserSql;
        }//end if

        //Oracle�Υ꥿���󥳡��ɤ��������
        $dRtnCodePos = mb_strpos($sOraErrMsg, "ORA-");

        if ($sOraErrMsg == "") {
            $sOraRntCode = "ORA-00000";
        }
        else {
            $sOraRntCode = mb_substr($sOraErrMsg, $dRtnCodePos, 9);
        }//end if

        //��������������Ͽ
        $strSql = "";
        $strSql = $strSql . "INSERT INTO IDM_SQLLOG_TBL";
        $strSql = $strSql . " ( ";
        $strSql = $strSql . " SYORI_DATE, ";
        $strSql = $strSql . " TABLE_NAME, ";
        $strSql = $strSql . " OPERATOR, ";
        $strSql = $strSql . " RESULT, ";
        $strSql = $strSql . " QUERY ";
        $strSql = $strSql . " ) ";
        $strSql = $strSql . " values ( ";
        $strSql = $strSql . SYSDATE . ",";
        $strSql = $strSql . cmToOraString($sDBName) . ",";
        $strSql = $strSql . cmToOraString($sUserId) . ",";
        $strSql = $strSql . cmToOraString($sOraRntCode) . ",";
        $strSql = $strSql . cmToOraString($sFinalUserSql) . ")";

        //�ӣѣ̤μ¹�
        cmOCIExecuteUpdate( $conn, $strSql, $sErrMsg,OCI_COMMIT_ON_SUCCESS );

    }

    //***************************************************************
    // �ؿ�̾ �� cmDeleteChar
    // ����ǽ �� ��!�פ�ʸ������ɲ�
    //
    // ������ ��ʸ����
    // ����� ��ʸ����
    //
    // ������ �� 2005/02/16�⹿��
    //***************************************************************
    function cmDeleteChar(&$sval){
        $dNum = 0;
        while($dNum < strlen($sval)){
            if(substr($sval, $dNum , 1) == "!"){
                switch(substr($sval, $dNum + 1 , 1)){
                    case "!":
                        $sval = substr($sval, 0, $dNum) . "!" . substr($sval, $dNum + 2);
                        break;
                    case "a":
                        $sval = substr($sval, 0, $dNum) . ">" . substr($sval, $dNum + 2);
                        break;
                    case "b":
                        $sval = substr($sval, 0, $dNum) . "<" . substr($sval, $dNum + 2);
                        break;
                    case "c":
                        $sval = substr($sval, 0, $dNum) . "@" . substr($sval, $dNum + 2);
                        break;
                    case "d":
                        $sval = substr($sval, 0, $dNum) . "''" . substr($sval, $dNum + 2);
                        break;
                    case "e":
                        $sval = substr($sval, 0, $dNum) . "\"" . substr($sval, $dNum + 2);
                        break;
                    case "f":
                        $sval = substr($sval, 0, $dNum) . "+" . substr($sval, $dNum + 2);
                        break;
                    case "g":
                        $sval = substr($sval, 0, $dNum) . "&" . substr($sval, $dNum + 2);
                        break;
                    case "h":
                        $sval = substr($sval, 0, $dNum) . "%" . substr($sval, $dNum + 2);
                        break;
                }
            }
            $dNum++;
        }
        return $sval;
    }
    //insert by �⹿�� 2005/07/11 start
    //***************************************************************
    // �ؿ�̾ �� cmDeleteArrayChar
    // ����ǽ �� ��!�פ�ʸ������ɲ�
    //
    // ������ ��ʸ����
    // ����� ��ʸ����
    //
    // ������ �� 2005/07/11�⹿��
    //***************************************************************
    function cmDeleteArrayChar(&$sval){
        $dLen = count($sval);
        for($i = 0;$i < $dLen;$i++){
            $sRow = $sval[$i];
            $dNum = 0;
            while($dNum < strlen($sRow)){
                if(substr($sRow, $dNum , 1) == "!"){
                    switch(substr($sRow, $dNum + 1 , 1)){
                        case "!":
                            $sRow = substr($sRow, 0, $dNum) . "!" . substr($sRow, $dNum + 2);
                            break;
                        case "a":
                            $sRow = substr($sRow, 0, $dNum) . ">" . substr($sRow, $dNum + 2);
                            break;
                        case "b":
                            $sRow = substr($sRow, 0, $dNum) . "<" . substr($sRow, $dNum + 2);
                            break;
                        case "c":
                            $sRow = substr($sRow, 0, $dNum) . "@" . substr($sRow, $dNum + 2);
                            break;
                        case "d":
                            $sRow = substr($sRow, 0, $dNum) . "''" . substr($sRow, $dNum + 2);
                            break;
                        case "e":
                            $sRow = substr($sRow, 0, $dNum) . "\"" . substr($sRow, $dNum + 2);
                            break;
                        case "f":
                            $sRow = substr($sRow, 0, $dNum) . "+" . substr($sRow, $dNum + 2);
                            break;
                        case "g":
                            $sRow = substr($sRow, 0, $dNum) . "&" . substr($sRow, $dNum + 2);
                            break;

                        case "h":
                            $sRow = substr($sRow, 0, $dNum) . "," . substr($sRow, $dNum + 2);
                            break;

                    }
                }
                $dNum++;
            }
            $sval[$i] = $sRow;
        }

        return $sval;
    }
    //insert by �⹿�� 2005/07/11 end

    //***************************************************************
    // �ؿ�̾ �� cmAddChar
    // ����ǽ �� ʸ������Ѵ�
    //
    // ������ ��ʸ����
    // ����� ��ʸ����
    //
    // ������ �� 2005/02/16�⹿��
    //***************************************************************
    function cmAddChar($sval){
        $dNum = 0;
        while($dNum < strlen($sval)){
            switch(substr($sval, $dNum, 1)){
                case "!":
                    $sval = substr($sval, 0, $dNum) . "!!" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case ">":
                    $sval = substr($sval, 0, $dNum) . "!a" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case "<":
                    $sval = substr($sval, 0, $dNum) . "!b" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case "@":
                    $sval = substr($sval, 0, $dNum) . "!c" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case "'":
                    $sval = substr($sval, 0, $dNum) . "!d" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case "\"":
                    $sval = substr($sval, 0, $dNum) . "!e" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case "+":
                    $sval = substr($sval, 0, $dNum) . "!f" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                case "&":
                    $sval = substr($sval, 0, $dNum) . "!g" . substr($sval, $dNum + 1);
                    $dNum = $dNum + 2;
                    break;
                default:
                    if(substr($sval, $dNum, 1) < chr(0x81)){
                        $dNum++;
                    }
                    else{
                        $dNum += 2;
                    }
            }
        }
        return $sval;
    }

    //*******************************************************************
    // �ؿ�̾ �� cmMaintenanceCheck
    // ����ǽ �� sg�ե����뤫����ƻ��־��������
    // ������ ��
    // ������ �� $mntInfo : ���ƥʥ󥹻��־���
    // ����� �� �ʤ�
    // ������ �� 2003/11/13 ����@TNES
    //*******************************************************************
    function cmMaintenanceCheck( &$mntInfo ) {

        // SG�ե����륪���ץ�
        $fp = fopen("/home2/bbwtu/html/IDman/cm/sg.dat","r");

        // ���ƥʥ󥹻��֤μ���
        while ($data = fgets ($fp)) {
            $Taisyo = explode('=', $data);
            if ( count( $Taisyo ) >= 2 ) {
                if ( $Taisyo[1] != "\n" ) {
                    $term_g = explode(":", $Taisyo[1]);
                    $mntInfo["from$Taisyo[0]"] = $term_g[0];
                    $mntInfo["to$Taisyo[0]"]   = $term_g[1];
                    cmCheckMainteTime( $Taisyo[0], $mntInfo );
                } else if ( $Taisyo[1] == "\n" ) {
                    $mntInfo["from$Taisyo[0]"] = NULL;
                    $mntInfo["to$Taisyo[0]"]   = NULL;
                }
            }
        }

        fclose($fp);

    }

    //*******************************************************************
    // �ؿ�̾ �� cmCheckMainteTime
    // ����ǽ �� �����ߡ����ꤵ��Ƥ�����ƥʥ󥹻��֤������å�����
    // ������ ��
    // ������ �� $Taisyo    : �оݶ�̳̾
    //           $mntInfo   : ���ƻ��־���
    // ����� �� �ʤ�
    // ������ �� 2003/11/13 ����@TNES
    //*******************************************************************
    function cmCheckMainteTime( $Taisyo, &$mntInfo ) {

        $now_time = date("YmdHi");  // ���ߤλ���

        $mntInfo["from$Taisyo"] = date("YmdHi", mktime(substr($mntInfo["from$Taisyo"],8,2),substr($mntInfo["from$Taisyo"],10,2),0,substr($mntInfo["from$Taisyo"],4,2),substr($mntInfo["from$Taisyo"],6,2),substr($mntInfo["from$Taisyo"],0,4)));
        $mntInfo["to$Taisyo"]   = date("YmdHi", mktime(substr($mntInfo["to$Taisyo"],8,2),substr($mntInfo["to$Taisyo"],10,2),0,substr($mntInfo["to$Taisyo"],4,2),substr($mntInfo["to$Taisyo"],6,2),substr($mntInfo["to$Taisyo"],0,4)));

        // ���ߤ���̳���̥��ƻ����椫�Υ����å�
        if ( $mntInfo["from$Taisyo"] && $mntInfo["to$Taisyo"]) {
            if ( $now_time < $mntInfo["from$Taisyo"] || $now_time > $mntInfo["to$Taisyo"] ) {
                $mntInfo["from$Taisyo"] = NULL;
                $mntInfo["to$Taisyo"]   = NULL;
            }
        }
    }


    //***************************************************************
    // �ؿ�̾ �� cmCheckSession
    // ����ǽ �� �ێ��ގ��ݡ��Վ����ގ�����Ȏ��������ݾ���Ύ�������
    //
    // ������ �� $key (in) :���������ݡ�����
    //                        TYPE_SESS_USR_INF   �ێ��ގ��ݡ��Վ����ގ�����Ύ��������Τ�
    //                        �ێ��ގ��ݡ��Վ����ގ�����
    //                          CM_LOGIN_UID        ô����ID
    //                          CM_LOGIN_PWD        ô���Ԏʎߎ����܎��Ď�
    //                          CM_LOGIN_NME        ô����̾
    //                          CM_LOGIN_DEP        ô��������̾
    //                          CM_LOGIN_TEL        ô���������ֹ�
    //                          CM_LOGIN_MAL        ô���ԎҎ��َ��Ďގڎ�
    //                        ���̎Îގ���
    //                          CM_SESS_SENDTO      ���̴֎ʎߎ׎Ҏ���
    //                          CM_SESS_CONDITION   �������
    //                          CM_SESS_ADDITION    �ղþ��
    //                          CM_SESS_DETAIL      �َܺÎގ���
    // ����� �� true :����
    //           false:�۾�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmCheckSession( $key = "TYPE_SESS_USR_INF" ) {

        //�����ȤΥ��å����̾�ϡ����ꤷ���ͤ��ѹ�����ޤ���
        session_name( CM_SESS_NAME );

        //���������ݎÎގ�������������
        session_start();

        //�ێ��ގ��ݡ��Վ����ގ�����Ύ�������
        if ( !isset( $_SESSION[ CM_LOGIN_UID ] ) ) {    //ô����ID
            return false;
        }

        //���������ݾ���Ύ�������
        if ( $key != "TYPE_SESS_USR_INF" &&
             !isset( $_SESSION[ $key ] ) ) {
            return false;
        }

        return true;

    }

    //***************************************************************
    // �ؿ�̾ �� cmSetSession
    // ����ǽ �� ���������ݎÎގ��������ꤹ��
    //
    // ������ �� $key (in) :���������ݡ�����
    //                        �ێ��ގ��ݡ��Վ����ގ�����
    //                          CM_LOGIN_UID        ô����ID
    //                          CM_LOGIN_PWD        ô���Ԏʎߎ����܎��Ď�
    //                          CM_LOGIN_NME        ô����̾
    //                          CM_LOGIN_DEP        ô��������̾
    //                          CM_LOGIN_TEL        ô���������ֹ�
    //                          CM_LOGIN_MAL        ô���ԎҎ��َ��Ďގڎ�
    //                        ���̎Îގ���
    //                          CM_SESS_SENDTO      ���̴֎ʎߎ׎Ҏ���
    //                          CM_SESS_CONDITION   �������
    //                          CM_SESS_ADDITION    �ղþ��
    //                          CM_SESS_DETAIL      �َܺÎގ���
    //           $value :������������
    // ����� �� �ʤ�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmSetSession( $key, $value ) {

        //�����ȤΥ��å����̾�ϡ����ꤷ���ͤ��ѹ�����ޤ���
        session_name( CM_SESS_NAME );

        //���������ݎÎގ�������������
        session_start();

        //���������ݎÎގ��������ꤹ��
        $_SESSION[ $key ] = $value;


    }

    //***************************************************************
    // �ؿ�̾ �� cmGetSession
    // ����ǽ �� �����������ͤ��������
    //
    // ������ �� $key (in) :���������ݡ�����
    //                        �ێ��ގ��ݡ��Վ����ގ�����
    //                          CM_LOGIN_UID        ô����ID
    //                          CM_LOGIN_PWD        ô���Ԏʎߎ����܎��Ď�
    //                          CM_LOGIN_NME        ô����̾
    //                          CM_LOGIN_DEP        ô��������̾
    //                          CM_LOGIN_TEL        ô���������ֹ�
    //                          CM_LOGIN_MAL        ô���ԎҎ��َ��Ďގڎ�
    //                        ���̎Îގ���
    //                          CM_SESS_SENDTO      ���̴֎ʎߎ׎Ҏ���
    //                          CM_SESS_CONDITION   �������
    //                          CM_SESS_ADDITION    �ղþ��
    //                          CM_SESS_DETAIL      �َܺÎގ���
    // ����� �� $key�Ȥ���̾���Ύ�����������
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmGetSession( $key ) {

        //�����ȤΥ��å����̾�ϡ����ꤷ���ͤ��ѹ�����ޤ���
        session_name( CM_SESS_NAME );

        //���������ݎÎގ�������������
        session_start();

        //�����������ͤ��������
        if ( isset( $_SESSION[ $key ] ) ) {
            return $_SESSION[ $key ];
        } else {
            return "";
        } //end if

    }

    //***************************************************************
    // �ؿ�̾ �� cmUnsetSession
    // ����ǽ �� ���������ݾ����������
    //
    // ������ �� $key (in) :���������ݡ�����
    //                        TYPE_SESS_ALL         ���٤ƾ���
    //                        TYPE_SESS_INFO        ���̴֎ʎߎ׎Ҏ����ȸ������ȾَܺÎގ���
    //                        �ێ��ގ��ݡ��Վ����ގ�����
    //                          CM_LOGIN_UID        ô����ID
    //                          CM_LOGIN_PWD        ô���Ԏʎߎ����܎��Ď�
    //                          CM_LOGIN_NME        ô����̾
    //                          CM_LOGIN_DEP        ô��������̾
    //                          CM_LOGIN_TEL        ô���������ֹ�
    //                          CM_LOGIN_MAL        ô���ԎҎ��َ��Ďގڎ�
    //                        ���̎Îގ���
    //                          CM_SESS_SENDTO      ���̴֎ʎߎ׎Ҏ���
    //                          CM_SESS_CONDITION   �������
    //                          CM_SESS_ADDITION    �ղþ��
    //                          CM_SESS_DETAIL      �َܺÎގ���
    // ����� �� �ʤ�
    // ������ �� 2003/10/13 NECSI
    //***************************************************************
    function cmUnsetSession( $key = "TYPE_SESS_ALL" ) {

        //�����ȤΥ��å����̾�ϡ����ꤷ���ͤ��ѹ�����ޤ���
        session_name( CM_SESS_NAME );

        //���������ݡ��Îގ�������������
        session_start();

        //���٤Ǝ��������ݾ������
        if ( $key == "TYPE_SESS_ALL" ) {

            $_SESSION = array();
            unset( $_COOKIE[ CM_SESS_NAME ] );
            session_destroy();

        //���̴֎ʎߎ׎Ҏ����ȸ������ȾَܺÎގ����κ��
        } else if ( $key == "TYPE_SESS_INFO" ) {

            //���̴֎ʎߎ׎Ҏ���
            if ( isset( $_SESSION[ CM_SESS_SENDTO ] ) ) {
                unset( $_SESSION[ CM_SESS_SENDTO ] );
            } //end if

            //�������
            if ( ( $_SESSION[ CM_SESS_CONDITION ] ) ) {
                unset( $_SESSION[ CM_SESS_CONDITION ] );
            } //end if

            //�ղþ��
            if ( ( $_SESSION[ CM_SESS_ADDITION ] ) ) {
                unset( $_SESSION[ CM_SESS_ADDITION ] );
            } //end if

            //�َܺÎގ���
            if ( isset( $_SESSION[ CM_SESS_DETAIL ] ) ) {
                unset( $_SESSION[ CM_SESS_DETAIL ] );
            } //end if

        } else {

            //���������ݎÎގ�����������
            if ( isset( $_SESSION[ $key ] ) ) {
                unset( $_SESSION[ $key ] );
            } //end if

        } //end if

    }

    //***************************************************************
    // �ؿ�̾ �� cmAddQuotation
    // ����ǽ �� ���󥰥륯�����ơ����������
    //
    // ������ ��ʸ����
    // ����� ��ʸ����
    //
    // ������ �� 2005/06/15�⹿��
    //***************************************************************
    function cmAddQuotation($sval){
                $dNum = 0;
                while($dNum < strlen($sval)){
                        switch(substr($sval, $dNum, 1)){
                                case "'":
                                        $sval = substr($sval, 0, $dNum) . "''" . substr($sval, $dNum + 1);
                                        $dNum = $dNum + 2;
                                        break;
                                default:
                                        if(substr($sval, $dNum, 1) < chr(0x81)){
                                                $dNum++;
                                        }
                                        else{
                                                $dNum += 2;
                                        }
                        }
                }
                return $sval;
    }

    //***************************************************************
    // �ؿ�̾ �� cmCheckHankaku
    // ����ǽ �� Ⱦ��ʸ���󤫤�����å�����
    //
    // ������ ��ʸ����
    // ����� ��True/False
    //
    // ������ �� 2005/09/07 Y.Abe
    //***************************************************************
    function cmCheckHankaku( $sStr ){

        // �Х��ȿ��μ���
        $sByte = strlen( $sStr );

        // ʸ�����μ���
        $sNum  = mb_strlen( $sStr );

        if ( $sByte == $sNum ) {
            // �Х��ȿ� = ʸ�����ʤ�Ⱦ��ʸ����
            return true;
        } else {
            // �Х��ȿ� != ʸ�����ʤ����Ѻ�����
            return false;
        }

    }

    //***************************************************************
    // �ؿ�̾ �� cmCheckMailAddress
    // ����ǽ �� �᡼��Υե����ޥåȥ����å��򤹤�
    //
    // ������ ��ʸ����
    // ����� ��True/False
    //
    // ������ �� 2005/09/07 Y.Abe
    //***************************************************************
    function cmCheckMailAddress( $sStr ){

// Change TNES 2020/03/03 START
        //if ( ereg( "^.+@.+$", $sStr ) ) {
        if ( preg_match( "/^.+@.+$/",$sStr) ) {
// Change TNES 2020/03/03 END
            // ����ʥ᡼�륢�ɥ쥹
            return true;
        } else {
            // �����ʥ᡼�륢�ɥ쥹
            return false;
        }

    }

    //***************************************************************
    // �ؿ�̾ �� cmFgetcsvReg
    // ����ǽ �� �ե�����ݥ��󥿤���Ԥ��������CSV�ե�����ɤ��������
    //           fgetcsv������(�ޥ���Х����б�)
    // ������ ���ե�����ϥ�ɥ�
    //          ��󥰥�
    //          �ǥ�ߥ�
    //          �Ϥ�ʸ��
    // ����� ��True/False
    //          �ե�����ν�ü��ã��������ޤߡ����顼����FALSE���ֵ�
    // ������ �� 2008/12/09 K.Oikawa
    //***************************************************************
    function cmFgetcsvReg (&$handle, $length = null, $d = ',', $e = '"') {
        $d = preg_quote($d);
        $e = preg_quote($e);
        $_line = "";
        while (($eof != true)and(!feof($handle))) {
            $_line .= (empty($length) ? fgets($handle) : fgets($handle, $length));
            $itemcnt = preg_match_all('/'.$e.'/', $_line, $dummy);
            if ($itemcnt % 2 == 0) $eof = true;
        }
        $_csv_line = preg_replace('/(?:\r\n|[\r\n])?$/', $d, trim($_line));
        $_csv_pattern = '/('.$e.'[^'.$e.']*(?:'.$e.$e.'[^'.$e.']*)*'.$e.'|[^'.$d.']*)'.$d.'/';
        preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
        $_csv_data = $_csv_matches[1];
        for($_csv_i=0;$_csv_i<count($_csv_data);$_csv_i++){
            $_csv_data[$_csv_i]=preg_replace('/^'.$e.'(.*)'.$e.'$/s','$1',$_csv_data[$_csv_i]);
            $_csv_data[$_csv_i]=str_replace($e.$e, $e, $_csv_data[$_csv_i]);
        }
        return empty($_line) ? false : $_csv_data;
    }

?>
