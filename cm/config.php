<?

/*---------------------------------------------------------------
  Notes: °Ê²¼¤ÎÆâÍÆ¤Ï¶¦ÄÌ´Ø¿ô¤ÎÄêµÁ¤Î³µÍ×¤Ç¤¹
  ---------------------------------------------------------------

                             ´Ø¿ô°ìÍ÷

      ÈÖ¹æ  ´Ø¿ôÌ¾                      ÆâÍÆ
    ----------------------------------------------------------------
       1    cmOCILogon()                ŽÃŽÞŽ°ŽÀŽÍŽÞŽ°Ž½¤Ø¤ÎÀÜÂ³
       2    cmOCILogoff()               ŽÃŽÞŽ°ŽÀÀÜÂ³¤òºîÀ®½èÍý
       3    cmOCIExecuteSelect()        »²¾È·ÏÃ±½ã£Ó£Ñ£ÌÊ¸¤òÈ¯¹Ô
       4    cmOCIExecuteUpdate()        ¹¹¿··ÏÃ±½ã£Ó£Ñ£ÌÊ¸¤òÈ¯¹Ô
       5    cmOCICommit()               ¥È¥é¥ó¥¶¥¯¥·¥ç¥ó¤ò¥³¥ß¥Ã¥È¤·¤Þ¤¹
       6    cmOCIRollback()             ¥È¥é¥ó¥¶¥¯¥·¥ç¥ó¤ò¥í¡¼¥ë¥Ð¥Ã¥¯¤·¤Þ¤¹
       7    cmOCIError()                Oracle¤ÎŽ´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ¤Î¼èÆÀ
       9    cmNullToString()            null¤ò¶õÇòÊ¸»úÎó¤ËÊÑ´¹
      10    cmToOraString()             OracleÍÑÊ¸»úÎó¤ËÊÑ´¹
      11    cmHtmlEntities()            Å¬ÍÑ²ÄÇ½¤ÊÊ¸»ú¤òHTML¥¨¥ó¥Æ¥£¥Æ¥£¤ËÊÑ´¹¤¹¤ë
      12    cmCreatexml()               XMLÊ¸»úÎóºîÀ®
      13    cmGetErrorInfo()            DB¥á¥Ã¥»¡¼¥¸
      14    cmSendMail                  ¥á¡¼¥ëÁ÷ÉÕ¤¹¤ë
      15    cmEcho()                    XMLÊ¸»úÎóÊÑ´¹½ÐÎÏ
      16    cmWriteAccessroguDb()       ¥¢¥¯¥»¥¹¥í¥°¤ØÅÐÏ¿
      17    cmDeleteChar()             ¡Ö!¡×¤òÊ¸»úÎó¤ËÄÉ²Ã
      18    cmAddChar()                 Ê¸»úÎó¤òÊÑ´¹
          19    cmAddQuotation()            ¥·¥ó¥°¥ë¥¯¥©¡¼¥Æ¡¼¥·¥ç¥ó¤ò½èÍý
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

    // ¥á¥ó¥Æ¥Ê¥ó¥¹ÍÑ¥»¥Ã¥·¥ç¥óÊÑ¿ô °Ê²¼¤Î2¹Ô¤òÄÉ²Ã¤·¤Þ¤·¤¿  °¤Éô 2003/03/05
    define( "CM_SESS_MAINTE",   "SessMainte" );     //¥á¥ó¥Æ¥Ç¡¼¥¿
    define( "CM_SESS_GYOMU",    "SessGyomu" );

    // Ç§¾ÚDirectoryÍÑ¥â¥¸¥å¡¼¥ë¤Ø¤Î¥Ñ¥¹¤òÄÉ²Ã 2005.03.16 °¤Éô
    define( "CM_NECAUTH_DIR", "/home2/bbwtu/AuthDirectory/auth/AuthDirectoryCom.sh");

    // CM_TMP_DIR¤Î¥Ñ¥¹¤ò½¤Àµ 2005.03.16 °¤Éô
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
    //¶¦ÄÌÄê¿ôÆÉ¹þ
    include ( "cm_const.inc" );

    //E_ERROR¤ÈE_PARSE°Ê³°¤Ï²óÈò¤¹¤ë
    error_reporting( E_ERROR | E_PARSE );

    //V190
    define( "CM_BIGMAN_LOGIN",  "/usr/bin/perl /home2/bbwtu/AuthDirectory/auth/AuthBigmanLogin.pl" );
    define( "CM_BIGMAN_LOGOUT", "/home2/bbwtu/AuthDirectory/auth/AuthBigmanLogout.sh" );

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCILogon
    // µ¡¡¡Ç½ ¡§ ŽÃŽÞŽ°ŽÀŽÍŽÞŽ°Ž½¤Ø¤ÎÀÜÂ³
    // ¡¡¡¡¡¡ ¡¡
    // °ú¡¡¿ô ¡§ $conn (out) :ŽÃŽÞŽ°ŽÀŽÍŽÞŽ°Ž½ÀÜÂ³ID
    //           $sErrMsg (out) :Ž´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //           false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCILogon( &$conn,
                         &$sErrMsg ) {

        //putenv('ORACLE_BASE=/opt/oracle/product/10.2.0');
        //putenv('ORACLE_HOME=/opt/oracle/product/10.2.0');
        //putenv('ORA_NLS10=/opt/oracle/product/10.2.0/nls/data');
        //putenv('NLS_LANG=japanese_japan.JA16EUC');
        //putenv('LD_LIBRARY_PATH=/opt/oracle/product/10.2.0/lib');

        //Oracle¤ËÀÜÂ³
        // TNES´Ä¶­ÍÑ¤ÎÀ©¸æ¤òÄÉ²Ã
//        $conn = OCILogon( "bsp", "bsp", "bps" );
//        $conn = OCILogon( "bbbusert", "lbbbusert1", "D_oradb3d1" );

// Change TNES 2020/03/03 START
//        $conn = OCILogon( "PANDA1", "lpanda1_linux00", "new_panda" );
        $conn = oci_connect( "PANDA1", "lpanda1_linux00", "PANDA" );
// Change TNES 2020/03/03 END


        $errflg = cmOCIError( "", $sErrMsg );    //Ž´Ž×Ž°ŽÁŽªŽ¯Ž¸

        return $errflg;

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCILogoff
    // µ¡¡¡Ç½ ¡§ ŽÃŽÞŽ°ŽÀŽÍŽÞŽ°Ž½¤Ø¤ÎÀÜÂ³¤òÀÚÃÇ
    // ¡¡¡¡¡¡ ¡¡
    // °ú¡¡¿ô ¡§ $conn (in) :ŽÃŽÞŽ°ŽÀÀÜÂ³ID
    // Ìá¤êÃÍ ¡§ ¤Ê¤·
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCILogoff( $conn ) {

        //OracleÀÜÂ³¤ÎÀÚÃÇ

// Change TNES 2020/03/03 START
        //ocilogoff( $conn );
        oci_close( $conn );
// Change TNES 2020/03/03 END

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCIExecuteSelect
    // µ¡¡¡Ç½ ¡§ »²¾È·ÏÃ±½ã£Ó£Ñ£ÌÊ¸¤òÈ¯¹Ô
    //
    // °ú¡¡¿ô ¡§ $conn (in) :ŽÃŽÞŽ°ŽÀÀÜÂ³ID
    //           $sSQL (in) :SQLÊ¸
    //           $rows (out):¥ì¥³¡¼¥É¿ô
    //           $results (out):¥ì¥³¡¼¥ÉÇÛÎó
    //           $sErrMsg (out) :Ž´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //          false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCIExecuteSelect( $conn,
                                 $sSQL,
                                 &$rows,
                                 &$results,
                                 &$sErrMsg ) {

        //SQLÊ¸²òÀÏ
// Change TNES 2020/03/03 START
        //$stmt = OCIParse( $conn, $sSQL );
        $stmt = oci_parse( $conn, $sSQL );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $conn, $sErrMsg );    //Ž´Ž×Ž°ŽÁŽªŽ¯Ž¸
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement¤Î²òÊü
            oci_free_statement( $stmt );  //statement¤Î²òÊü
// Change TNES 2020/03/03 END
            return false;
        }

        //SQL¼Â¹Ô
// Change TNES 2020/03/03 START
        //OCIExecute( $stmt );
        oci_execute( $stmt );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $stmt, $sErrMsg );    //Ž´Ž×Ž°ŽÁŽªŽ¯Ž¸
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement¤Î²òÊü
            oci_free_statement( $stmt );  //statement¤Î²òÊü
// Change TNES 2020/03/03 END
            return false;
        }

        //ŽÃŽÞŽ°ŽÀ¤ÎÆÉ¹þ
// Change TNES 2020/03/03 START
        //$rows = OCIFetchStatement( $stmt, $results );
        $rows = oci_fetch_all( $stmt, $results );
// Change TNES 2020/03/03 END

        //statement¤Î²òÊü
// Change TNES 2020/03/03 START
        //OCIFreeStatement( $stmt );
        oci_free_statement( $stmt );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCIExecuteUpdate
    // µ¡¡¡Ç½ ¡§ ¹¹¿··ÏÃ±½ã£Ó£Ñ£ÌÊ¸¤òÈ¯¹Ô
    //
    // °ú¡¡¿ô ¡§ $conn (in) :ŽÃŽÞŽ°ŽÀÀÜÂ³ID
    //           $sSQL (in) :SQL
    //           $sErrMsg (out) :Ž´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ
    //           $mode (in) :£Ó£Ñ£ÌÈ¯¹Ô¤ÎŽÓŽ°ŽÄŽÞ
    //                          OCI_DEFAULT           : ¼«Æ°¥³¥ß¥Ã¥È¤·¤Ê¤¤
    //                          OCI_COMMIT_ON_SUCCESS : ¼«Æ°¥³¥ß¥Ã¥È¤¹¤ë
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //           false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCIExecuteUpdate( $conn,
                                 $sSQL,
                                 &$sErrMsg,
                                 $mode = OCI_COMMIT_ON_SUCCESS ) {

        //SQLÊ¸²òÀÏ
// Change TNES 2020/03/03 START
        //$stmt = OCIParse( $conn, $sSQL );
        $stmt = oci_parse( $conn, $sSQL );
// Change TNES 2020/03/03 END
        $errflg = cmOCIError( $conn, $sErrMsg );    //Ž´Ž×Ž°ŽÁŽªŽ¯Ž¸
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement¤Î²òÊü
            oci_free_statement( $stmt );  //statement¤Î²òÊü
// Change TNES 2020/03/03 END
            return false;
        }

        //SQL¼Â¹Ô
// Change TNES 2020/03/03 START
        //OCIExecute( $stmt, $mode );   //¼«Æ°¥³¥ß¥Ã¥È¤·¤Ê¤¤
        oci_execute( $stmt, $mode );   //¼«Æ°¥³¥ß¥Ã¥È¤·¤Ê¤¤
// Change TNES 2020/03/03 END
        $errflg = cmOCIError( $stmt, $sErrMsg );    //Ž´Ž×Ž°ŽÁŽªŽ¯Ž¸
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statement¤Î²òÊü
            oci_free_statement( $stmt );  //statement¤Î²òÊü
// Change TNES 2020/03/03 END
            return false;
        }

        //statement¤Î²òÊü
// Change TNES 2020/03/03 START
        //OCIFreeStatement( $stmt );
        oci_free_statement( $stmt );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCICommit
    // µ¡¡¡Ç½ ¡§ ¥È¥é¥ó¥¶¥¯¥·¥ç¥ó¤ò¥³¥ß¥Ã¥È¤·¤Þ¤¹
    //
    // °ú¡¡¿ô ¡§ $conn (in) :ŽÃŽÞŽ°ŽÀÀÜÂ³ID
    //           $sErrMsg (out) :Ž´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //          false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCICommit( $conn,
                          $sErrMsg ) {

        //SQLÊ¸²òÀÏ
// Change TNES 2020/03/03 START
        //OCICommit( $conn );
        oci_commit( $conn );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $conn, $sErrMsg );    //Ž´Ž×Ž°ŽÁŽªŽ¯Ž¸
        if ( $errflg === false ) {
            return false;
        }

        return true;

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCIRollback
    // µ¡¡¡Ç½ ¡§ ¥È¥é¥ó¥¶¥¯¥·¥ç¥ó¤ò¥í¡¼¥ë¥Ð¥Ã¥¯¤·¤Þ¤¹
    //
    // °ú¡¡¿ô ¡§ $conn (in) :ŽÃŽÞŽ°ŽÀÀÜÂ³ID
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //          false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCIRollback( $conn ) {

        //SQLÊ¸²òÀÏ
// Change TNES 2020/03/03 START
        //@OCIRollback( $conn );
        @oci_rollback( $conn );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmOCIError
    // µ¡¡¡Ç½ ¡§ Oracle¤ÎŽ´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ¤Î¼èÆÀ
    //
    // °ú¡¡¿ô ¡§ $connstmt (in) :ŽÃŽÞŽ°ŽÀŽÍŽÞŽ°Ž½ID
    //           $sErrMsg (out) :Ž´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //           false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmOCIError( $connstmt = "",
                         &$sErrMsg ) {

        //Ž´Ž×Ž°½èÍý
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

        //Ž´Ž×Ž°ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ¤Î¼èÆÀ
        if ( is_array( $Err ) ) {
            list( $code, $message ) = explode( ":", $Err[ "message" ], 2 );
            //$sErrMsg = cmHtmlEntities( "\n¥ê¥¿¡¼¥ó¥³¡¼¥É¡§".$code."\nÆâÍÆ¡§".$message."\n" );
            $sErrMsg = cmHtmlEntities($code . $message . "\n" );
            return false;
        }

        return true;

    }


    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmNullToString
    // µ¡¡¡Ç½ ¡§ null¤ò¶õÇòÊ¸»úÎó¤ËÊÑ´¹
    //
    // °ú¡¡¿ô ¡§ $val :ÁªÂò¤µ¤ì¤¿Ê¸»úÎó
    // Ìá¤êÃÍ ¡§ OracleÍÑÊ¸»úÎó
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmNullToString( $val ) {

        if ( $val === null ) {
            return "";
        } else {
            return $val;
        }

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmToOraString
    // µ¡¡¡Ç½ ¡§ OracleÍÑÊ¸»úÎó¤ËÊÑ´¹
    //
    // °ú¡¡¿ô ¡§ $val :ÁªÂò¤µ¤ì¤¿Ê¸»úÎó
    // Ìá¤êÃÍ ¡§ OracleÍÑÊ¸»úÎó
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmToOraString( $val ) {
        if ( $val === "" ) {
            return "null";
        } else {
            return "'".$val."'";
        }

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ : cmHtmlEntities
    //
    // µ¡Ç½   : Å¬ÍÑ²ÄÇ½¤ÊÊ¸»ú¤òHTML¥¨¥ó¥Æ¥£¥Æ¥£¤ËÊÑ´¹¤¹¤ë
    // °ú¿ô   : $sSrc :ÂÐ¾ÝÊ¸»úÎó
    // Ìá¤êÃÍ : ÊÑ´¹¸å¤ÎÊ¸»úÎó
    // ºîÀ®Æü : 2003/10/13 NECSI
    //***************************************************************
    function cmHtmlEntities( $sSrc ){

        //Ê¸»úÎó¤ÎÊÑ´¹
        $sResult = str_replace( "\"", "&quot;", $sSrc );
        $sResult = str_replace( "<", "&lt;", $sResult );
        $sResult = str_replace( ">", "&gt;", $sResult );

        return( $sResult );

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmCreatexml
    // µ¡¡¡Ç½ ¡§ XMLÊ¸»úÎóºîÀ®
    //
    // °ú¡¡¿ô ¡§&$sxml_string  XMLÊ¸»úÎó        string
    //          $axml_key      XML¤ÎKeywords    array
    //          $axml_value    XML¤ÎAttributes  array
    //          $dtotalRows    $axml_value¤Îlenth       number
    // Ìá¤êÃÍ ¡§
    //
    // ºîÀ®¼Ô ¡§ 2005/01/11 Áâ¹¿¿ð
    //***************************************************************
    function cmCreatexml(&$sxml_string,$axml_key,$axml_value,$dtotalRows){

        // XMLKeywords¸Ä¿ô¤Î¼èÆÀ
        $dkey_length = count($axml_key);
        // $sxml_string¤ÎLength¤Î¼èÆÀ
// Change TNES 2020/03/03 START
        //$dxml_length = count($sxml_string);
        $dxml_length = strlen($sxml_string);
// Change TNES 2020/03/03 END
        
        // $dxml_length == 0»þ XMLversion¾ðÊó¤ÎÄÉ²Ã

// Delete TNES 2020/03/03 START
//        if($dxml_length == 0){
//            $sxml_string .="<?xml version='1.0' encoding='UTF-8'?";
//            $sxml_string .=">";
//        }
// Delete TNES 2020/03/03 END

        // ¿·XML node ¤ÎÄÉ²Ã
        $sxml_string .="<datapacket";
        // IF $dtotalRows > 0 $axml_value bu wei kong "xmlresult='true'"¤ÎÄÉ²Ã¡¡else "xmlresult='false'"¤ÎÄÉ²Ã
        if($dtotalRows > 0){
            $sxml_string .=" xmlresult='true'";
        }
        else{
            $sxml_string .=" xmlresult='false'";
        }
        $sxml_string .=">";

        //
        $drow_no = 0;
        // XML Childs ¤ÎÄÉ²Ã
        while($drow_no < $dtotalRows){
            // row ¤ÎÄÉ²Ã
            $sxml_string .= "<row ";
            // row ¤ÎÅ¶½¼
            for($dline_no = 0; $dline_no < $dkey_length; $dline_no++){
                // XMLKeyword ¤ÎÄÉ²Ã
                $sxml_string .= $axml_key[$dline_no]."=";
                // XMLKeyword ¤Î¼èÆÀ
                $scurrentkey  = $axml_key[$dline_no];
                $sxml_string .= "'";
                // XML¤ÎAttributes ¤òÄÉ²Ã
                $sxml_string .= cmAddChar($axml_value[$scurrentkey][$drow_no]);
                $sxml_string .= "' ";

            }
            // rowÄÉ²Ã´°Î»
            $sxml_string .= "/>";
            $drow_no++;
        }
        // XML node ÄÉ²Ã´°Î»
        $sxml_string .= "</datapacket>";

    }
    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmRenkeiSyori
    // µ¡¡¡Ç½ ¡§ Ï¢·È¤Î½èÍý¤ò¹Ô¤¯
    //
    // °ú¡¡¿ô ¡§ $sReqData (in)        :Ï¢·È¥Ç¡¼¥¿
    //           $sErrMsg (out)       :Ž´Ž×Ž°¡¦ŽÒŽ¯Ž¾Ž°Ž¼ŽÞ
    //           $sRenkeiMethod (in)  :Ï¢·ÈÊý¼°
    // Ìá¤êÃÍ ¡§ true   :  Ï¢·È£Ï£Ë
    //          false  : Ï¢·È£Î£Ç
    // ºîÀ®¼Ô ¡§ 2003/09/23 NECSL
    //***************************************************************
    function cmRenkeiSyori( $sReqData, &$sErrMsg, $sRenkeiMethod, &$aKeyword ) {

//ONLY FOR TEST
//return true;
//END ONLY FOR TEST

//////////////////////////////////////////////////////////////////////////////
//                            CAUTION!!!!                                   //
//        ¥Æ¥¹¥ÈÍÑ¤Ë¥Æ¥ó¥Ý¥é¥ê¥Õ¥¡¥¤¥ë¤ÏÁ´¤Æºï½ü¤·¤Æ¤¤¤Þ¤»¤ó¡£              //
//////////////////////////////////////////////////////////////////////////////

        //ASP_FunctionCAll ¥Ñ¥é¥á¡¼¥¿¥Õ¥¡¥¤¥ëÌ¾
        // update by Y.Abe 2006/05/23 pidÂÐ±þ Start
        //$sTmpFilename = CM_TMP_DIR . "/request" . date("YmdHis") . '.txt';
        $sTmpFilename = CM_TMP_DIR . "/request" . date("YmdHis") . posix_getpid() . '.txt';
        // update by Y.Abe 2006/05/23 pidÂÐ±þ End

        $ASP_FUNC = CM_ASP_FUNC . " " . $sRenkeiMethod ." ";

        //ASP_FunctionCAll ¥Ñ¥é¥á¡¼¥¿¥Õ¥¡¥¤¥ë½àÈ÷
        $fpASPFunc  = fopen($sTmpFilename, "w");
        if(!$fpASPFunc) {

            $sErrMsg = "¥¢¥×¥ê¥±¡¼¥·¥ç¥ó¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡Êtmp¥Õ¥¡¥¤¥ë¥ª¡¼¥×¥ó¡Ë¡£¥·¥¹¥Æ¥à´ÉÍý¼Ô¤ËÏ¢Íí¤·¤Æ¤¯¤À¤µ¤¤¡£";
            return false;
        }//end if

        $bRtn = fwrite($fpASPFunc, $sReqData);
        if( $bRtn == -1 ) {

            fclose($fpASPFunc);

            //TMP¥Õ¥¡¥¤¥ëºï½ü
            //unlink($sTmpFilename);

            $sErrMsg = "¥¢¥×¥ê¥±¡¼¥·¥ç¥ó¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡Êtmp¥Õ¥¡¥¤¥ë½ñ¤­ŽºŽ ¤ß¡Ë¡£¥·¥¹¥Æ¥à´ÉÍý¼Ô¤ËÏ¢Íí¤·¤Æ¤¯¤À¤µ¤¤¡£";
            return false;
        }//end if

        if( !fclose($fpASPFunc) ) {

            //TMP¥Õ¥¡¥¤¥ëºï½ü
            //unlink($sTmpFilename);

            $sErrMsg = "¥¢¥×¥ê¥±¡¼¥·¥ç¥ó¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡Êtmp¥Õ¥¡¥¤¥ë¥¯¥í¡¼¥º¡Ë¡£¥·¥¹¥Æ¥à´ÉÍý¼Ô¤ËÏ¢Íí¤·¤Æ¤¯¤À¤µ¤¤¡£";
            return false;
        }//end if

//UPDATE ABE 050523 START
        //ASP_FunctionCAll ¸Æ¤Ó½Ð¤·
        //$fpPipe = popen("$ASP_FUNC < $sTmpFilename", "r");
        //if( !$fpPipe ) {

            //TMP¥Õ¥¡¥¤¥ëºï½ü
            //unlink($sTmpFilename);

        //    $sErrMsg = "¥¢¥×¥ê¥±¡¼¥·¥ç¥ó¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡ÊASP_FUNCTION_CALL¸Æ¤Ó½Ð¤·¡Ë¡£¥·¥¹¥Æ¥à´ÉÍý¼Ô¤ËÏ¢Íí¤·¤Æ¤¯¤À¤µ¤¤¡£";
        //    return false;
        //}//end if
//UPDATE ABE 050523 END

        // update by Y.Abe 2006/05/23 pidÂÐ±þ Start
        //$sRetFilename = CM_TMP_DIR . "/return" . date("YmdHis") . '.txt';
        $sRetFilename = CM_TMP_DIR . "/return" . date("YmdHis") . posix_getpid() . '.txt';
        // update by Y.Abe 2006/05/23 pidÂÐ±þ End

        $asp_cmd = system("$ASP_FUNC < $sTmpFilename > $sRetFilename");
        $fpPipe = fopen("$sRetFilename", "r");

        if( !$fpPipe ) {
            //TMP¥Õ¥¡¥¤¥ëºï½ü
            //unlink($sTmpFilename);
            $sErrMsg = "¥¢¥×¥ê¥±¡¼¥·¥ç¥ó¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡ÊASP_FUNCTION_CALL¸Æ¤Ó½Ð¤·¡Ë¡£¥·¥¹¥Æ¥à´ÉÍý¼Ô¤ËÏ¢Íí¤·¤Æ¤¯¤À¤µ¤¤¡£";
            return false;
        }//end if


        //ASP_FunctionCAll ·ë²Ì¼èÆÀ
        while( !feof($fpPipe) ) {

          $WK = chop(fgets($fpPipe));
          list($a, $b) = explode("=", $WK);
          $aKeyword[$a] = $b;
        }

        $bRtn = pclose($fpPipe);

        //TMP¥Õ¥¡¥¤¥ëºï½ü
        //if( !unlink($sTmpFilename) ) {

        //    $sErrMsg = "¥¢¥×¥ê¥±¡¼¥·¥ç¥ó¥¨¥é¡¼¤¬È¯À¸¤·¤Þ¤·¤¿¡ÊTMP¥Õ¥¡¥¤¥ëºï½ü¡Ë¡£¥·¥¹¥Æ¥à´ÉÍý¼Ô¤ËÏ¢Íí¤·¤Æ¤¯¤À¤µ¤¤¡£";
        //    return false;
        //}//end if

        return true;
    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmGetErrorInfo
    // µ¡¡¡Ç½ ¡§ ¥á¥Ã¥»¡¼¥¸¼èÆÀ
    // IN     ¡§ $sErrMsg          ¥á¥Ã¥»¡¼¥¸
    // OUT    ¡§ XMLÊ¸»úÎó
    // Create ¡§ 2005/01/19 Íû¹¨¸÷ V0.0
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
    // ´Ø¿ôÌ¾ ¡§ cmSendMail
    // µ¡¡¡Ç½ ¡§ ¥á¡¼¥ëÁ÷ÉÕ¤¹¤ë
    //
    // °ú¡¡¿ô ¡§$sMailSbt    (in)    :  ½èÍý¼ïÊÌ
    //          $sMailTo             : Á÷¿®¼Ô
    //          $sMailSubject(in)    : ·ïÌ¾
    //          $sMailText (in)      :  ¥á¥Ã¥»¡¼¥¸ÆâÍÆ
    //
    // Ìá¤êÃÍ ¡§ true   :  £Ï£Ë
    //          false  : £Î£Ç
    // ºîÀ®¼Ô ¡§ 2005/03/01 Íû¹¨¸÷
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
        /*Insert by Ä¥¶ÇÕ± 2005/04/19 Start*/
        $sMyURL = $oResultEmail["REQ_URL"];
        $dMyIndex = strpos($sMyURL,"?");
        $sMystr2 = substr($sMyURL,$dMyIndex+1);

        /*Update by Ä¥¶ÇÕ± 2005/04/19 Start*/
        //if (strpos($sMystr2,"?") != -1) {
        if (strpos($sMystr2,"?") != "") {
        /*Update by Ä¥¶ÇÕ± 2005/04/19 End*/
            $sMystr1 = substr($sMyURL,0,$dMyIndex);
            $sMystr3 = strstr($sMystr2,"?");
            $oResultEmail["REQ_URL"] = $sMystr1.$sMystr3;
        }
        /*Insert by Ä¥¶ÇÕ± 2005/04/19 End*/

        //Insert by Íû¹¨¸÷ 2005/05/12 Start
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
                //¥Ç¡¼¥¿¥Ù¡¼¥¹¤Ø¤ÎÀÜÂ³
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
                    //¥Ç¡¼¥¿¥Ù¡¼¥¹¤Ø¤ÎÀÜÂ³¤òÀÚÃÇ
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
        //Insert by Íû¹¨¸÷ 2005/05/12 End
//Insert by Íû¹¨¸÷ 2005/05/13 Start
        // add by Y.Abe 2005/11/28 Start
        $sShinseiSbt = "";
        // add by Y.Abe 2005/11/28 End
        if ($sMailSbt != "5.1.3.14") {
            switch($oResultEmail["SHINSEI_SBT"]) {
                case "NEWID":
                    $oResultEmail["SHINSEI_SBT"] = "BIGLOBE_ID¿·µ¬";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "NEWID";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "SPNEWID":
                    $oResultEmail["SHINSEI_SBT"] = "ÆÃ¼ìBIGLOBE_ID¿·µ¬";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "SPNEWID";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "UPDDEL":
                    $oResultEmail["SHINSEI_SBT"] = "´ûÂ¸IDÊÑ¹¹¡¿ºï½ü";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "UPDDEL";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "NEWAUTH":
                    $oResultEmail["SHINSEI_SBT"] = "Ã´Åö¼ÔID¡¦Áàºî¸¢¸Â¿·µ¬";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "NEWAUTH";
                    // add by Y.Abe 2005/11/28 End
                    break;
                default :
                    break;
            }
        }
//Insert by Íû¹¨¸÷ 2005/05/13 End

        switch ($sMailSbt) {
            //5.1.3.3   ¾µÇ§°ÍÍê¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.3":
                $handle = fopen(CM_EMAIL_DIR . "/syoninirai.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by Íû¹¨¸÷ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by Íû¹¨¸÷ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.4   ¸ÄÊÌÁàºî¸¢¸Â¾µÇ§°ÍÍê¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.4":
                $handle = fopen(CM_EMAIL_DIR . "/kobetusyoninirai.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by Íû¹¨¸÷ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by Íû¹¨¸÷ 2005/03/21 End
                $sNew = array("index.php");

                // add by Y.Abe 2005/11/11 Start
                //¥Ç¡¼¥¿¥Ù¡¼¥¹¤Ø¤ÎÀÜÂ³
                if ( !cmOCILogon( $conn, $sErrMsg ) ) {
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if

                // ¾µÇ§ÂÐ¾Ý¤Î¸¢¸Â¥ê¥¹¥È¼èÆÀÍÑSQL
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

                // SQL¤ÎÈ¯¹Ô
                if ( !cmOCIExecuteSelect( $conn, $sSql, $dRows, $oResults, $sErrMsg ) ) {
                    //¥Ç¡¼¥¿¥Ù¡¼¥¹¤Ø¤ÎÀÜÂ³¤òÀÚÃÇ
                    cmOCILogoff( $conn );
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if

                // ¥ê¥¹¥È¤òºîÀ®
                $sAuthList = "";
                for ( $i = 0; $i < $dRows; $i++ ) {
                    $sAuthList .= "¡¡".$oResults["AUTHORITY_NAME"][$i] . "
";
                }
                // add by Y.Abe 2005/11/11 End

                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.5   ÈÝÇ§ÄÌÃÎ¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.5":
                $handle = fopen(CM_EMAIL_DIR . "/hinin.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by Íû¹¨¸÷ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by Íû¹¨¸÷ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
                              //UPDATE by Áý»Ò 2005/04/21 START
                              //"$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SYONIN_NAME ",
                              "$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SYONIN_NAME",
                              //UPDATE by Áý»Ò 2005/04/21 END
                              "$", "DENIAL_REASON", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SYONIN_EMAIL"], "", $oResultEmail["SHINSEI_NAME"],
                              "", $oResultEmail["REQUEST_DATE"], "", $oResultEmail["SHINSEI_SBT"],
                              //UPDATE by Áý»Ò 2005/04/21 START
                              //"", $oResultEmail["REQ_NUM"], "", $oResultEmail["SYONIN_NAME "],
                              "", $oResultEmail["REQ_NUM"], "", $oResultEmail["SYONIN_NAME"],
                              //UPDATE by Áý»Ò 2005/04/21 END
                              "", $oResultEmail["DENIAL_REASON"], "", $oResultEmail["REQ_URL"]);*/
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.6   Âå¹Ô¾µÇ§Êó¹ð¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.6":
                $handle = fopen(CM_EMAIL_DIR . "/daikouhoukoku.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by Íû¹¨¸÷ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by Íû¹¨¸÷ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 Start
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.7   ¼è²¼¤²ÄÌÃÎ¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.7":
                $handle = fopen(CM_EMAIL_DIR . "/torisage.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.8   ÌÌÀÜÄÌÃÎ¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.8":
                $handle = fopen(CM_EMAIL_DIR . "/mensetu.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.9   ÅÐÏ¿´°Î»ÄÌÃÎ¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
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
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.10   ÅÐÏ¿¥¨¥é¡¼ÄÌÃÎ¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.10":
                $handle = fopen(CM_EMAIL_DIR . "/error.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.11   ²ñ°÷¥°¥ë¡¼¥×¤Ø¤Î½èÍý°ÍÍê¥á¡¼¥ë¥Æ¥ó¥×¥ì¡¼¥È
            case "5.1.3.11":
                $handle = fopen(CM_EMAIL_DIR . "/bcs.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by Íû¹¨¸÷ 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by Íû¹¨¸÷ 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.12   ¥Á¥§¥Ã¥¯·ë²ÌNGÄÌÃÎ¥á¡¼¥ë¡ÊÌµ½þID¿·µ¬¡Ë
            case "5.1.3.12":
                $handle = fopen(CM_EMAIL_DIR . "/csv_err.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.13   ¥Á¥§¥Ã¥¯·ë²ÌNGÄÌÃÎ¥á¡¼¥ë¡ÊÌµ½þID¿·µ¬°Ê³°¡Ë
            case "5.1.3.13":
                //$handle = fopen(CM_EMAIL_DIR , "/csv_tantou_err.tmpl","r");
                $handle = fopen(CM_EMAIL_DIR . "/csv_tantou_err.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by Íû¹¨¸÷ 2005/05/16 Start
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
//Update by Íû¹¨¸÷ 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.14   ´ÉÍý¼Ô¸þ¤±¥¢¥é¡¼¥à¥á¡¼¥ë
            case "5.1.3.14":
                $handle = fopen(CM_EMAIL_DIR . "/systemerr.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by Íû¹¨¸÷ 2005/05/16 Start
                $sOld = array('$ERR_MSG');
                $sNew = array($oResultEmail["ERR_MSG"]);
/*                $sOld = array("$", "ERR_MSG");
                $sNew = array("", $oResultEmail["ERR_MSG"]);*/
//Update by Íû¹¨¸÷ 2005/05/16 End
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

        //--Ê¸ËÜ³Ê¼°
        if ( $sEmailText != "" ){
            $sEmailText = mb_convert_encoding($sEmailText, "JIS",  "EUC_JP");
            $pp = popen("/usr/lib/sendmail -t -f ".SYSTEM_MAIL, "w");
            fwrite($pp, $sEmailText);
            pclose($pp);
        }

        return false;
    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmEcho
    // µ¡¡¡Ç½ ¡§ XMLÊ¸»úÎóÊÑ´¹½ÐÎÏ
    //
    // °ú¡¡¿ô ¡§$sxml_string  XMLÊ¸»úÎó        string
    // Ìá¤êÃÍ ¡§¤Ê¤·
    //
    // ºîÀ®¼Ô ¡§ 2005/02/16Áâ¹¿¿ð
    //***************************************************************
    function cmEcho($sxml_string){
        //XMLÊ¸»úÎóÊÑ´¹
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
    // ´Ø¿ôÌ¾ ¡§ cmReplaceMsg
    // µ¡¡¡Ç½ ¡§ XMLÊ¸»úÎóÊÑ´¹½ÐÎÏ
    //
    // °ú¡¡¿ô ¡§$sErrMsg     XMLÊ¸»úÎó        string
    //          $sStr
    // Ìá¤êÃÍ ¡§¥á¥Ã¥»¡¼¥¸
    //
    // ºîÀ®¼Ô ¡§ 2005/03/02 Íû¹¨¸÷
    //***************************************************************
    function cmReplaceMsg($sErrMsg, $sStr) {
        $sOld = array("¢¤");
        $sNew = array($sStr);
        $sErrMsg = str_replace($sOld, $sNew, $sErrMsg);
        return $sErrMsg;
    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§cmWriteAccessroguDb
    // µ¡¡¡Ç½ ¡§¥¢¥¯¥»¥¹¥í¥°¤ØÅÐÏ¿
    // °ú¡¡¿ô ¡§$sDBName             :ÂÐ¾Ý¥Æ¡¼¥Ö¥ë£É£Ä
    //          $sUserId             :ÅÐÏ¿¼Ô¡¢¹¹¿·¼Ô¡¢ºï½ü¼Ô
    //          $sOraErrMsg          :Oracle¤Î¥ê¥¿¡¼¥ó¥á¥Ã¥»¡¼¥¸
    //          $strUserSql          :SQL¹½Ê¸ÆâÍÆ
    // Ìá¤êÃÍ ¡§¤Ê¤·
    // ºîÀ®¼Ô ¡§2005/03/23  Íû¹¨¸÷
    //***************************************************************
    function cmWriteAccessroguDb( $sDBName, $sUserId, $sOraErrMsg, $strUserSql, $conn ) {

        //¶ØÂ§Ê¸»ú¤ÎÊÑ´¹
        $sChgUserSql = mb_ereg_replace("'", "¡Ç", $strUserSql);

        if ( strlen( $sChgUserSql ) > 2560 ) {
            $sFinalUserSql = substr($sChgUserSql, 0, 2558);
        } else {
            $sFinalUserSql = $sChgUserSql;
        }//end if

        //Oracle¤Î¥ê¥¿¡¼¥ó¥³¡¼¥É¤ò¼èÆÀ¤¹¤ë
        $dRtnCodePos = mb_strpos($sOraErrMsg, "ORA-");

        if ($sOraErrMsg == "") {
            $sOraRntCode = "ORA-00000";
        }
        else {
            $sOraRntCode = mb_substr($sOraErrMsg, $dRtnCodePos, 9);
        }//end if

        //¥¢¥¯¥»¥¹¥í¥°¤ØÅÐÏ¿
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

        //£Ó£Ñ£Ì¤Î¼Â¹Ô
        cmOCIExecuteUpdate( $conn, $strSql, $sErrMsg,OCI_COMMIT_ON_SUCCESS );

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmDeleteChar
    // µ¡¡¡Ç½ ¡§ ¡Ö!¡×¤òÊ¸»úÎó¤ËÄÉ²Ã
    //
    // °ú¡¡¿ô ¡§Ê¸»úÎó
    // Ìá¤êÃÍ ¡§Ê¸»úÎó
    //
    // ºîÀ®¼Ô ¡§ 2005/02/16Áâ¹¿¿ð
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
    //insert by Áâ¹¿¿ð 2005/07/11 start
    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmDeleteArrayChar
    // µ¡¡¡Ç½ ¡§ ¡Ö!¡×¤òÊ¸»úÎó¤ËÄÉ²Ã
    //
    // °ú¡¡¿ô ¡§Ê¸»úÎó
    // Ìá¤êÃÍ ¡§Ê¸»úÎó
    //
    // ºîÀ®¼Ô ¡§ 2005/07/11Áâ¹¿¿ð
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
    //insert by Áâ¹¿¿ð 2005/07/11 end

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmAddChar
    // µ¡¡¡Ç½ ¡§ Ê¸»úÎó¤òÊÑ´¹
    //
    // °ú¡¡¿ô ¡§Ê¸»úÎó
    // Ìá¤êÃÍ ¡§Ê¸»úÎó
    //
    // ºîÀ®¼Ô ¡§ 2005/02/16Áâ¹¿¿ð
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
    // ´Ø¿ôÌ¾ ¡§ cmMaintenanceCheck
    // µ¡¡¡Ç½ ¡§ sg¥Õ¥¡¥¤¥ë¤«¤é¥á¥ó¥Æ»þ´Ö¾ðÊó¤òÆÀ¤ë
    // ¡¡¡¡¡¡ ¡¡
    // °ú¡¡¿ô ¡§ $mntInfo : ¥á¥ó¥Æ¥Ê¥ó¥¹»þ´Ö¾ðÊó
    // Ìá¤êÃÍ ¡§ ¤Ê¤·
    // ºîÀ®¼Ô ¡§ 2003/11/13 °¤Éô@TNES
    //*******************************************************************
    function cmMaintenanceCheck( &$mntInfo ) {

        // SG¥Õ¥¡¥¤¥ë¥ª¡¼¥×¥ó
        $fp = fopen("/home2/bbwtu/html/IDman/cm/sg.dat","r");

        // ¥á¥ó¥Æ¥Ê¥ó¥¹»þ´Ö¤Î¼èÆÀ
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
    // ´Ø¿ôÌ¾ ¡§ cmCheckMainteTime
    // µ¡¡¡Ç½ ¡§ º£¸½ºß¡¢ÀßÄê¤µ¤ì¤Æ¤¤¤ë¥á¥ó¥Æ¥Ê¥ó¥¹»þ´Ö¤«¥Á¥§¥Ã¥¯¤¹¤ë
    // ¡¡¡¡¡¡ ¡¡
    // °ú¡¡¿ô ¡§ $Taisyo    : ÂÐ¾Ý¶ÈÌ³Ì¾
    //           $mntInfo   : ¥á¥ó¥Æ»þ´Ö¾ðÊó
    // Ìá¤êÃÍ ¡§ ¤Ê¤·
    // ºîÀ®¼Ô ¡§ 2003/11/13 °¤Éô@TNES
    //*******************************************************************
    function cmCheckMainteTime( $Taisyo, &$mntInfo ) {

        $now_time = date("YmdHi");  // ¸½ºß¤Î»þ¹ï

        $mntInfo["from$Taisyo"] = date("YmdHi", mktime(substr($mntInfo["from$Taisyo"],8,2),substr($mntInfo["from$Taisyo"],10,2),0,substr($mntInfo["from$Taisyo"],4,2),substr($mntInfo["from$Taisyo"],6,2),substr($mntInfo["from$Taisyo"],0,4)));
        $mntInfo["to$Taisyo"]   = date("YmdHi", mktime(substr($mntInfo["to$Taisyo"],8,2),substr($mntInfo["to$Taisyo"],10,2),0,substr($mntInfo["to$Taisyo"],4,2),substr($mntInfo["to$Taisyo"],6,2),substr($mntInfo["to$Taisyo"],0,4)));

        // ¸½ºß¤¬¶ÈÌ³²èÌÌ¥á¥ó¥Æ»þ´ÖÃæ¤«¤Î¥Á¥§¥Ã¥¯
        if ( $mntInfo["from$Taisyo"] && $mntInfo["to$Taisyo"]) {
            if ( $now_time < $mntInfo["from$Taisyo"] || $now_time > $mntInfo["to$Taisyo"] ) {
                $mntInfo["from$Taisyo"] = NULL;
                $mntInfo["to$Taisyo"]   = NULL;
            }
        }
    }


    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmCheckSession
    // µ¡¡¡Ç½ ¡§ ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó¤ÈŽ¾Ž¯Ž¼Ž®ŽÝ¾ðÊó¤ÎŽÁŽªŽ¯Ž¸
    //
    // °ú¡¡¿ô ¡§ $key (in) :Ž¾Ž¯Ž¼Ž®ŽÝ¡¦Ž·Ž°
    //                        TYPE_SESS_USR_INF   ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó¤ÎŽÁŽªŽ¯Ž¸¤Î¤ß
    //                        ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó
    //                          CM_LOGIN_UID        Ã´Åö¼ÔID
    //                          CM_LOGIN_PWD        Ã´Åö¼ÔŽÊŽßŽ°Ž½ŽÜŽ°ŽÄŽÞ
    //                          CM_LOGIN_NME        Ã´Åö¼ÔÌ¾
    //                          CM_LOGIN_DEP        Ã´Åö¼ÔÉô½ðÌ¾
    //                          CM_LOGIN_TEL        Ã´Åö¼ÔÅÅÏÃÈÖ¹æ
    //                          CM_LOGIN_MAL        Ã´Åö¼ÔŽÒŽ°ŽÙŽ±ŽÄŽÞŽÚŽ½
    //                        ²èÌÌŽÃŽÞŽ°ŽÀ
    //                          CM_SESS_SENDTO      ²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ
    //                          CM_SESS_CONDITION   ¸¡º÷¾ò·ï
    //                          CM_SESS_ADDITION    ÉÕ²Ã¾ò·ï
    //                          CM_SESS_DETAIL      ¾ÜºÙŽÃŽÞŽ°ŽÀ
    // Ìá¤êÃÍ ¡§ true :Àµ¾ï
    //           false:°Û¾ï
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmCheckSession( $key = "TYPE_SESS_USR_INF" ) {

        //¥«¥ì¥ó¥È¤Î¥»¥Ã¥·¥ç¥óÌ¾¤Ï¡¢»ØÄê¤·¤¿ÃÍ¤ËÊÑ¹¹¤µ¤ì¤Þ¤¹¡£
        session_name( CM_SESS_NAME );

        //Ž¾Ž¯Ž¼Ž®ŽÝŽÃŽÞŽ°ŽÀ¤ò½é´ü²½¤¹¤ë
        session_start();

        //ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó¤ÎŽÁŽªŽ¯Ž¸
        if ( !isset( $_SESSION[ CM_LOGIN_UID ] ) ) {    //Ã´Åö¼ÔID
            return false;
        }

        //Ž¾Ž¯Ž¼Ž®ŽÝ¾ðÊó¤ÎŽÁŽªŽ¯Ž¸
        if ( $key != "TYPE_SESS_USR_INF" &&
             !isset( $_SESSION[ $key ] ) ) {
            return false;
        }

        return true;

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmSetSession
    // µ¡¡¡Ç½ ¡§ Ž¾Ž¯Ž¼Ž®ŽÝŽÃŽÞŽ°ŽÀ¤òÀßÄê¤¹¤ë
    //
    // °ú¡¡¿ô ¡§ $key (in) :Ž¾Ž¯Ž¼Ž®ŽÝ¡¦Ž·Ž°
    //                        ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó
    //                          CM_LOGIN_UID        Ã´Åö¼ÔID
    //                          CM_LOGIN_PWD        Ã´Åö¼ÔŽÊŽßŽ°Ž½ŽÜŽ°ŽÄŽÞ
    //                          CM_LOGIN_NME        Ã´Åö¼ÔÌ¾
    //                          CM_LOGIN_DEP        Ã´Åö¼ÔÉô½ðÌ¾
    //                          CM_LOGIN_TEL        Ã´Åö¼ÔÅÅÏÃÈÖ¹æ
    //                          CM_LOGIN_MAL        Ã´Åö¼ÔŽÒŽ°ŽÙŽ±ŽÄŽÞŽÚŽ½
    //                        ²èÌÌŽÃŽÞŽ°ŽÀ
    //                          CM_SESS_SENDTO      ²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ
    //                          CM_SESS_CONDITION   ¸¡º÷¾ò·ï
    //                          CM_SESS_ADDITION    ÉÕ²Ã¾ò·ï
    //                          CM_SESS_DETAIL      ¾ÜºÙŽÃŽÞŽ°ŽÀ
    //           $value :Ž¾Ž¯Ž¼Ž®ŽÝÃÍ
    // Ìá¤êÃÍ ¡§ ¤Ê¤·
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmSetSession( $key, $value ) {

        //¥«¥ì¥ó¥È¤Î¥»¥Ã¥·¥ç¥óÌ¾¤Ï¡¢»ØÄê¤·¤¿ÃÍ¤ËÊÑ¹¹¤µ¤ì¤Þ¤¹¡£
        session_name( CM_SESS_NAME );

        //Ž¾Ž¯Ž¼Ž®ŽÝŽÃŽÞŽ°ŽÀ¤ò½é´ü²½¤¹¤ë
        session_start();

        //Ž¾Ž¯Ž¼Ž®ŽÝŽÃŽÞŽ°ŽÀ¤òÀßÄê¤¹¤ë
        $_SESSION[ $key ] = $value;


    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmGetSession
    // µ¡¡¡Ç½ ¡§ Ž¾Ž¯Ž¼Ž®ŽÝÃÍ¤ò¼èÆÀ¤¹¤ë
    //
    // °ú¡¡¿ô ¡§ $key (in) :Ž¾Ž¯Ž¼Ž®ŽÝ¡¦Ž·Ž°
    //                        ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó
    //                          CM_LOGIN_UID        Ã´Åö¼ÔID
    //                          CM_LOGIN_PWD        Ã´Åö¼ÔŽÊŽßŽ°Ž½ŽÜŽ°ŽÄŽÞ
    //                          CM_LOGIN_NME        Ã´Åö¼ÔÌ¾
    //                          CM_LOGIN_DEP        Ã´Åö¼ÔÉô½ðÌ¾
    //                          CM_LOGIN_TEL        Ã´Åö¼ÔÅÅÏÃÈÖ¹æ
    //                          CM_LOGIN_MAL        Ã´Åö¼ÔŽÒŽ°ŽÙŽ±ŽÄŽÞŽÚŽ½
    //                        ²èÌÌŽÃŽÞŽ°ŽÀ
    //                          CM_SESS_SENDTO      ²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ
    //                          CM_SESS_CONDITION   ¸¡º÷¾ò·ï
    //                          CM_SESS_ADDITION    ÉÕ²Ã¾ò·ï
    //                          CM_SESS_DETAIL      ¾ÜºÙŽÃŽÞŽ°ŽÀ
    // Ìá¤êÃÍ ¡§ $key¤È¤¤¤¦Ì¾Á°¤ÎŽ¾Ž¯Ž¼Ž®ŽÝÃÍ
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmGetSession( $key ) {

        //¥«¥ì¥ó¥È¤Î¥»¥Ã¥·¥ç¥óÌ¾¤Ï¡¢»ØÄê¤·¤¿ÃÍ¤ËÊÑ¹¹¤µ¤ì¤Þ¤¹¡£
        session_name( CM_SESS_NAME );

        //Ž¾Ž¯Ž¼Ž®ŽÝŽÃŽÞŽ°ŽÀ¤ò½é´ü²½¤¹¤ë
        session_start();

        //Ž¾Ž¯Ž¼Ž®ŽÝÃÍ¤ò¼èÆÀ¤¹¤ë
        if ( isset( $_SESSION[ $key ] ) ) {
            return $_SESSION[ $key ];
        } else {
            return "";
        } //end if

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmUnsetSession
    // µ¡¡¡Ç½ ¡§ Ž¾Ž¯Ž¼Ž®ŽÝ¾ðÊó¤òºï½ü¤¹¤ë
    //
    // °ú¡¡¿ô ¡§ $key (in) :Ž¾Ž¯Ž¼Ž®ŽÝ¡¦Ž·Ž°
    //                        TYPE_SESS_ALL         ¤¹¤Ù¤Æ¾ðÊó
    //                        TYPE_SESS_INFO        ²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ¤È¸¡º÷¾ò·ï¤È¾ÜºÙŽÃŽÞŽ°ŽÀ
    //                        ŽÛŽ¸ŽÞŽ²ŽÝ¡¦ŽÕŽ°Ž»ŽÞŽ°¾ðÊó
    //                          CM_LOGIN_UID        Ã´Åö¼ÔID
    //                          CM_LOGIN_PWD        Ã´Åö¼ÔŽÊŽßŽ°Ž½ŽÜŽ°ŽÄŽÞ
    //                          CM_LOGIN_NME        Ã´Åö¼ÔÌ¾
    //                          CM_LOGIN_DEP        Ã´Åö¼ÔÉô½ðÌ¾
    //                          CM_LOGIN_TEL        Ã´Åö¼ÔÅÅÏÃÈÖ¹æ
    //                          CM_LOGIN_MAL        Ã´Åö¼ÔŽÒŽ°ŽÙŽ±ŽÄŽÞŽÚŽ½
    //                        ²èÌÌŽÃŽÞŽ°ŽÀ
    //                          CM_SESS_SENDTO      ²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ
    //                          CM_SESS_CONDITION   ¸¡º÷¾ò·ï
    //                          CM_SESS_ADDITION    ÉÕ²Ã¾ò·ï
    //                          CM_SESS_DETAIL      ¾ÜºÙŽÃŽÞŽ°ŽÀ
    // Ìá¤êÃÍ ¡§ ¤Ê¤·
    // ºîÀ®¼Ô ¡§ 2003/10/13 NECSI
    //***************************************************************
    function cmUnsetSession( $key = "TYPE_SESS_ALL" ) {

        //¥«¥ì¥ó¥È¤Î¥»¥Ã¥·¥ç¥óÌ¾¤Ï¡¢»ØÄê¤·¤¿ÃÍ¤ËÊÑ¹¹¤µ¤ì¤Þ¤¹¡£
        session_name( CM_SESS_NAME );

        //Ž¾Ž¯Ž¼Ž®ŽÝ¡¦ŽÃŽÞŽ°ŽÀ¤ò½é´ü²½¤¹¤ë
        session_start();

        //¤¹¤Ù¤ÆŽ¾Ž¯Ž¼Ž®ŽÝ¾ðÊó¤òºï½ü
        if ( $key == "TYPE_SESS_ALL" ) {

            $_SESSION = array();
            unset( $_COOKIE[ CM_SESS_NAME ] );
            session_destroy();

        //²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ¤È¸¡º÷¾ò·ï¤È¾ÜºÙŽÃŽÞŽ°ŽÀ¤Îºï½ü
        } else if ( $key == "TYPE_SESS_INFO" ) {

            //²èÌÌ´ÖŽÊŽßŽ×ŽÒŽ°ŽÀ
            if ( isset( $_SESSION[ CM_SESS_SENDTO ] ) ) {
                unset( $_SESSION[ CM_SESS_SENDTO ] );
            } //end if

            //¸¡º÷¾ò·ï
            if ( ( $_SESSION[ CM_SESS_CONDITION ] ) ) {
                unset( $_SESSION[ CM_SESS_CONDITION ] );
            } //end if

            //ÉÕ²Ã¾ò·ï
            if ( ( $_SESSION[ CM_SESS_ADDITION ] ) ) {
                unset( $_SESSION[ CM_SESS_ADDITION ] );
            } //end if

            //¾ÜºÙŽÃŽÞŽ°ŽÀ
            if ( isset( $_SESSION[ CM_SESS_DETAIL ] ) ) {
                unset( $_SESSION[ CM_SESS_DETAIL ] );
            } //end if

        } else {

            //Ž¾Ž¯Ž¼Ž®ŽÝŽÃŽÞŽ°ŽÀ¤òºï½ü¤¹¤ë
            if ( isset( $_SESSION[ $key ] ) ) {
                unset( $_SESSION[ $key ] );
            } //end if

        } //end if

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmAddQuotation
    // µ¡¡¡Ç½ ¡§ ¥·¥ó¥°¥ë¥¯¥©¡¼¥Æ¡¼¥·¥ç¥ó¤ò½èÍý
    //
    // °ú¡¡¿ô ¡§Ê¸»úÎó
    // Ìá¤êÃÍ ¡§Ê¸»úÎó
    //
    // ºîÀ®¼Ô ¡§ 2005/06/15Áâ¹¿¿ð
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
    // ´Ø¿ôÌ¾ ¡§ cmCheckHankaku
    // µ¡¡¡Ç½ ¡§ È¾³ÑÊ¸»úÎó¤«¤ò¥Á¥§¥Ã¥¯¤¹¤ë
    //
    // °ú¡¡¿ô ¡§Ê¸»úÎó
    // Ìá¤êÃÍ ¡§True/False
    //
    // ºîÀ®¼Ô ¡§ 2005/09/07 Y.Abe
    //***************************************************************
    function cmCheckHankaku( $sStr ){

        // ¥Ð¥¤¥È¿ô¤Î¼èÆÀ
        $sByte = strlen( $sStr );

        // Ê¸»ú¿ô¤Î¼èÆÀ
        $sNum  = mb_strlen( $sStr );

        if ( $sByte == $sNum ) {
            // ¥Ð¥¤¥È¿ô = Ê¸»ú¿ô¤Ê¤éÈ¾³ÑÊ¸»úÎó
            return true;
        } else {
            // ¥Ð¥¤¥È¿ô != Ê¸»ú¿ô¤Ê¤éÁ´³Ñº®¤¸¤ê
            return false;
        }

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmCheckMailAddress
    // µ¡¡¡Ç½ ¡§ ¥á¡¼¥ë¤Î¥Õ¥©¡¼¥Þ¥Ã¥È¥Á¥§¥Ã¥¯¤ò¤¹¤ë
    //
    // °ú¡¡¿ô ¡§Ê¸»úÎó
    // Ìá¤êÃÍ ¡§True/False
    //
    // ºîÀ®¼Ô ¡§ 2005/09/07 Y.Abe
    //***************************************************************
    function cmCheckMailAddress( $sStr ){

// Change TNES 2020/03/03 START
        //if ( ereg( "^.+@.+$", $sStr ) ) {
        if ( preg_match( "/^.+@.+$/",$sStr) ) {
// Change TNES 2020/03/03 END
            // Àµ¾ï¤Ê¥á¡¼¥ë¥¢¥É¥ì¥¹
            return true;
        } else {
            // ÉÔÀµ¤Ê¥á¡¼¥ë¥¢¥É¥ì¥¹
            return false;
        }

    }

    //***************************************************************
    // ´Ø¿ôÌ¾ ¡§ cmFgetcsvReg
    // µ¡¡¡Ç½ ¡§ ¥Õ¥¡¥¤¥ë¥Ý¥¤¥ó¥¿¤«¤é¹Ô¤ò¼èÆÀ¤·¡¢CSV¥Õ¥£¡¼¥ë¥É¤ò½èÍý¤¹¤ë
    //           fgetcsv²þÎÉÈÇ(¥Þ¥ë¥Á¥Ð¥¤¥ÈÂÐ±þ)
    // °ú¡¡¿ô ¡§¥Õ¥¡¥¤¥ë¥Ï¥ó¥É¥ë
    //          ¥ì¥ó¥°¥¹
    //          ¥Ç¥ê¥ß¥¿
    //          °Ï¤¤Ê¸»ú
    // Ìá¤êÃÍ ¡§True/False
    //          ¥Õ¥¡¥¤¥ë¤Î½ªÃ¼¤ËÃ£¤·¤¿¾ì¹ç¤ò´Þ¤ß¡¢¥¨¥é¡¼»þ¤ËFALSE¤òÊÖµÑ
    // ºîÀ®¼Ô ¡§ 2008/12/09 K.Oikawa
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
