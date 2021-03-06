<?

/*---------------------------------------------------------------
  Notes: 以下の内容は共通関数の定義の概要です
  ---------------------------------------------------------------

                             関数一覧

      番号  関数名                      内容
    ----------------------------------------------------------------
       1    cmOCILogon()                ﾃﾞｰﾀﾍﾞｰｽへの接続
       2    cmOCILogoff()               ﾃﾞｰﾀ接続を作成処理
       3    cmOCIExecuteSelect()        参照系単純ＳＱＬ文を発行
       4    cmOCIExecuteUpdate()        更新系単純ＳＱＬ文を発行
       5    cmOCICommit()               トランザクションをコミットします
       6    cmOCIRollback()             トランザクションをロールバックします
       7    cmOCIError()                Oracleのｴﾗｰﾒｯｾｰｼﾞの取得
       9    cmNullToString()            nullを空白文字列に変換
      10    cmToOraString()             Oracle用文字列に変換
      11    cmHtmlEntities()            適用可能な文字をHTMLエンティティに変換する
      12    cmCreatexml()               XML文字列作成
      13    cmGetErrorInfo()            DBメッセージ
      14    cmSendMail                  メール送付する
      15    cmEcho()                    XML文字列変換出力
      16    cmWriteAccessroguDb()       アクセスログへ登録
      17    cmDeleteChar()             「!」を文字列に追加
      18    cmAddChar()                 文字列を変換
          19    cmAddQuotation()            シングルクォーテーションを処理
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

    // メンテナンス用セッション変数 以下の2行を追加しました  阿部 2003/03/05
    define( "CM_SESS_MAINTE",   "SessMainte" );     //メンテデータ
    define( "CM_SESS_GYOMU",    "SessGyomu" );

    // 認証Directory用モジュールへのパスを追加 2005.03.16 阿部
    define( "CM_NECAUTH_DIR", "/home2/bbwtu/AuthDirectory/auth/AuthDirectoryCom.sh");

    // CM_TMP_DIRのパスを修正 2005.03.16 阿部
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
    //共通定数読込
    include ( "cm_const.inc" );

    //E_ERRORとE_PARSE以外は回避する
    error_reporting( E_ERROR | E_PARSE );

    //V190
    define( "CM_BIGMAN_LOGIN",  "/usr/bin/perl /home2/bbwtu/AuthDirectory/auth/AuthBigmanLogin.pl" );
    define( "CM_BIGMAN_LOGOUT", "/home2/bbwtu/AuthDirectory/auth/AuthBigmanLogout.sh" );

    //***************************************************************
    // 関数名 ： cmOCILogon
    // 機　能 ： ﾃﾞｰﾀﾍﾞｰｽへの接続
    // 　　　 　
    // 引　数 ： $conn (out) :ﾃﾞｰﾀﾍﾞｰｽ接続ID
    //           $sErrMsg (out) :ｴﾗｰﾒｯｾｰｼﾞ
    // 戻り値 ： true :正常
    //           false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCILogon( &$conn,
                         &$sErrMsg ) {

        //putenv('ORACLE_BASE=/opt/oracle/product/10.2.0');
        //putenv('ORACLE_HOME=/opt/oracle/product/10.2.0');
        //putenv('ORA_NLS10=/opt/oracle/product/10.2.0/nls/data');
        //putenv('NLS_LANG=japanese_japan.JA16EUC');
        //putenv('LD_LIBRARY_PATH=/opt/oracle/product/10.2.0/lib');

        //Oracleに接続
        // TNES環境用の制御を追加
//        $conn = OCILogon( "bsp", "bsp", "bps" );
//        $conn = OCILogon( "bbbusert", "lbbbusert1", "D_oradb3d1" );

// Change TNES 2020/03/03 START
//        $conn = OCILogon( "PANDA1", "lpanda1_linux00", "new_panda" );
        $conn = oci_connect( "PANDA1", "lpanda1_linux00", "PANDA" );
// Change TNES 2020/03/03 END


        $errflg = cmOCIError( "", $sErrMsg );    //ｴﾗｰﾁｪｯｸ

        return $errflg;

    }

    //***************************************************************
    // 関数名 ： cmOCILogoff
    // 機　能 ： ﾃﾞｰﾀﾍﾞｰｽへの接続を切断
    // 　　　 　
    // 引　数 ： $conn (in) :ﾃﾞｰﾀ接続ID
    // 戻り値 ： なし
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCILogoff( $conn ) {

        //Oracle接続の切断

// Change TNES 2020/03/03 START
        //ocilogoff( $conn );
        oci_close( $conn );
// Change TNES 2020/03/03 END

    }

    //***************************************************************
    // 関数名 ： cmOCIExecuteSelect
    // 機　能 ： 参照系単純ＳＱＬ文を発行
    //
    // 引　数 ： $conn (in) :ﾃﾞｰﾀ接続ID
    //           $sSQL (in) :SQL文
    //           $rows (out):レコード数
    //           $results (out):レコード配列
    //           $sErrMsg (out) :ｴﾗｰﾒｯｾｰｼﾞ
    // 戻り値 ： true :正常
    //          false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCIExecuteSelect( $conn,
                                 $sSQL,
                                 &$rows,
                                 &$results,
                                 &$sErrMsg ) {

        //SQL文解析
// Change TNES 2020/03/03 START
        //$stmt = OCIParse( $conn, $sSQL );
        $stmt = oci_parse( $conn, $sSQL );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $conn, $sErrMsg );    //ｴﾗｰﾁｪｯｸ
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statementの解放
            oci_free_statement( $stmt );  //statementの解放
// Change TNES 2020/03/03 END
            return false;
        }

        //SQL実行
// Change TNES 2020/03/03 START
        //OCIExecute( $stmt );
        oci_execute( $stmt );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $stmt, $sErrMsg );    //ｴﾗｰﾁｪｯｸ
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statementの解放
            oci_free_statement( $stmt );  //statementの解放
// Change TNES 2020/03/03 END
            return false;
        }

        //ﾃﾞｰﾀの読込
// Change TNES 2020/03/03 START
        //$rows = OCIFetchStatement( $stmt, $results );
        $rows = oci_fetch_all( $stmt, $results );
// Change TNES 2020/03/03 END

        //statementの解放
// Change TNES 2020/03/03 START
        //OCIFreeStatement( $stmt );
        oci_free_statement( $stmt );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // 関数名 ： cmOCIExecuteUpdate
    // 機　能 ： 更新系単純ＳＱＬ文を発行
    //
    // 引　数 ： $conn (in) :ﾃﾞｰﾀ接続ID
    //           $sSQL (in) :SQL
    //           $sErrMsg (out) :ｴﾗｰﾒｯｾｰｼﾞ
    //           $mode (in) :ＳＱＬ発行のﾓｰﾄﾞ
    //                          OCI_DEFAULT           : 自動コミットしない
    //                          OCI_COMMIT_ON_SUCCESS : 自動コミットする
    // 戻り値 ： true :正常
    //           false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCIExecuteUpdate( $conn,
                                 $sSQL,
                                 &$sErrMsg,
                                 $mode = OCI_COMMIT_ON_SUCCESS ) {

        //SQL文解析
// Change TNES 2020/03/03 START
        //$stmt = OCIParse( $conn, $sSQL );
        $stmt = oci_parse( $conn, $sSQL );
// Change TNES 2020/03/03 END
        $errflg = cmOCIError( $conn, $sErrMsg );    //ｴﾗｰﾁｪｯｸ
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statementの解放
            oci_free_statement( $stmt );  //statementの解放
// Change TNES 2020/03/03 END
            return false;
        }

        //SQL実行
// Change TNES 2020/03/03 START
        //OCIExecute( $stmt, $mode );   //自動コミットしない
        oci_execute( $stmt, $mode );   //自動コミットしない
// Change TNES 2020/03/03 END
        $errflg = cmOCIError( $stmt, $sErrMsg );    //ｴﾗｰﾁｪｯｸ
        if ( $errflg === false ) {
// Change TNES 2020/03/03 START
            //OCIFreeStatement( $stmt );  //statementの解放
            oci_free_statement( $stmt );  //statementの解放
// Change TNES 2020/03/03 END
            return false;
        }

        //statementの解放
// Change TNES 2020/03/03 START
        //OCIFreeStatement( $stmt );
        oci_free_statement( $stmt );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // 関数名 ： cmOCICommit
    // 機　能 ： トランザクションをコミットします
    //
    // 引　数 ： $conn (in) :ﾃﾞｰﾀ接続ID
    //           $sErrMsg (out) :ｴﾗｰﾒｯｾｰｼﾞ
    // 戻り値 ： true :正常
    //          false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCICommit( $conn,
                          $sErrMsg ) {

        //SQL文解析
// Change TNES 2020/03/03 START
        //OCICommit( $conn );
        oci_commit( $conn );
// Change TNES 2020/03/03 END

        $errflg = cmOCIError( $conn, $sErrMsg );    //ｴﾗｰﾁｪｯｸ
        if ( $errflg === false ) {
            return false;
        }

        return true;

    }

    //***************************************************************
    // 関数名 ： cmOCIRollback
    // 機　能 ： トランザクションをロールバックします
    //
    // 引　数 ： $conn (in) :ﾃﾞｰﾀ接続ID
    // 戻り値 ： true :正常
    //          false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCIRollback( $conn ) {

        //SQL文解析
// Change TNES 2020/03/03 START
        //@OCIRollback( $conn );
        @oci_rollback( $conn );
// Change TNES 2020/03/03 END

        return true;

    }

    //***************************************************************
    // 関数名 ： cmOCIError
    // 機　能 ： Oracleのｴﾗｰﾒｯｾｰｼﾞの取得
    //
    // 引　数 ： $connstmt (in) :ﾃﾞｰﾀﾍﾞｰｽID
    //           $sErrMsg (out) :ｴﾗｰﾒｯｾｰｼﾞ
    // 戻り値 ： true :正常
    //           false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmOCIError( $connstmt = "",
                         &$sErrMsg ) {

        //ｴﾗｰ処理
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

        //ｴﾗｰﾒｯｾｰｼﾞの取得
        if ( is_array( $Err ) ) {
            list( $code, $message ) = explode( ":", $Err[ "message" ], 2 );
            //$sErrMsg = cmHtmlEntities( "\nリターンコード：".$code."\n内容：".$message."\n" );
            $sErrMsg = cmHtmlEntities($code . $message . "\n" );
            return false;
        }

        return true;

    }


    //***************************************************************
    // 関数名 ： cmNullToString
    // 機　能 ： nullを空白文字列に変換
    //
    // 引　数 ： $val :選択された文字列
    // 戻り値 ： Oracle用文字列
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmNullToString( $val ) {

        if ( $val === null ) {
            return "";
        } else {
            return $val;
        }

    }

    //***************************************************************
    // 関数名 ： cmToOraString
    // 機　能 ： Oracle用文字列に変換
    //
    // 引　数 ： $val :選択された文字列
    // 戻り値 ： Oracle用文字列
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmToOraString( $val ) {
        if ( $val === "" ) {
            return "null";
        } else {
            return "'".$val."'";
        }

    }

    //***************************************************************
    // 関数名 : cmHtmlEntities
    //
    // 機能   : 適用可能な文字をHTMLエンティティに変換する
    // 引数   : $sSrc :対象文字列
    // 戻り値 : 変換後の文字列
    // 作成日 : 2003/10/13 NECSI
    //***************************************************************
    function cmHtmlEntities( $sSrc ){

        //文字列の変換
        $sResult = str_replace( "\"", "&quot;", $sSrc );
        $sResult = str_replace( "<", "&lt;", $sResult );
        $sResult = str_replace( ">", "&gt;", $sResult );

        return( $sResult );

    }

    //***************************************************************
    // 関数名 ： cmCreatexml
    // 機　能 ： XML文字列作成
    //
    // 引　数 ：&$sxml_string  XML文字列        string
    //          $axml_key      XMLのKeywords    array
    //          $axml_value    XMLのAttributes  array
    //          $dtotalRows    $axml_valueのlenth       number
    // 戻り値 ：
    //
    // 作成者 ： 2005/01/11 曹洪瑞
    //***************************************************************
    function cmCreatexml(&$sxml_string,$axml_key,$axml_value,$dtotalRows){

        // XMLKeywords個数の取得
        $dkey_length = count($axml_key);
        // $sxml_stringのLengthの取得
// Change TNES 2020/03/03 START
        //$dxml_length = count($sxml_string);
        $dxml_length = strlen($sxml_string);
// Change TNES 2020/03/03 END
        
        // $dxml_length == 0時 XMLversion情報の追加

// Delete TNES 2020/03/03 START
//        if($dxml_length == 0){
//            $sxml_string .="<?xml version='1.0' encoding='UTF-8'?";
//            $sxml_string .=">";
//        }
// Delete TNES 2020/03/03 END

        // 新XML node の追加
        $sxml_string .="<datapacket";
        // IF $dtotalRows > 0 $axml_value bu wei kong "xmlresult='true'"の追加　else "xmlresult='false'"の追加
        if($dtotalRows > 0){
            $sxml_string .=" xmlresult='true'";
        }
        else{
            $sxml_string .=" xmlresult='false'";
        }
        $sxml_string .=">";

        //
        $drow_no = 0;
        // XML Childs の追加
        while($drow_no < $dtotalRows){
            // row の追加
            $sxml_string .= "<row ";
            // row の填充
            for($dline_no = 0; $dline_no < $dkey_length; $dline_no++){
                // XMLKeyword の追加
                $sxml_string .= $axml_key[$dline_no]."=";
                // XMLKeyword の取得
                $scurrentkey  = $axml_key[$dline_no];
                $sxml_string .= "'";
                // XMLのAttributes を追加
                $sxml_string .= cmAddChar($axml_value[$scurrentkey][$drow_no]);
                $sxml_string .= "' ";

            }
            // row追加完了
            $sxml_string .= "/>";
            $drow_no++;
        }
        // XML node 追加完了
        $sxml_string .= "</datapacket>";

    }
    //***************************************************************
    // 関数名 ： cmRenkeiSyori
    // 機　能 ： 連携の処理を行く
    //
    // 引　数 ： $sReqData (in)        :連携データ
    //           $sErrMsg (out)       :ｴﾗｰ・ﾒｯｾｰｼﾞ
    //           $sRenkeiMethod (in)  :連携方式
    // 戻り値 ： true   :  連携ＯＫ
    //          false  : 連携ＮＧ
    // 作成者 ： 2003/09/23 NECSL
    //***************************************************************
    function cmRenkeiSyori( $sReqData, &$sErrMsg, $sRenkeiMethod, &$aKeyword ) {

//ONLY FOR TEST
//return true;
//END ONLY FOR TEST

//////////////////////////////////////////////////////////////////////////////
//                            CAUTION!!!!                                   //
//        テスト用にテンポラリファイルは全て削除していません。              //
//////////////////////////////////////////////////////////////////////////////

        //ASP_FunctionCAll パラメータファイル名
        // update by Y.Abe 2006/05/23 pid対応 Start
        //$sTmpFilename = CM_TMP_DIR . "/request" . date("YmdHis") . '.txt';
        $sTmpFilename = CM_TMP_DIR . "/request" . date("YmdHis") . posix_getpid() . '.txt';
        // update by Y.Abe 2006/05/23 pid対応 End

        $ASP_FUNC = CM_ASP_FUNC . " " . $sRenkeiMethod ." ";

        //ASP_FunctionCAll パラメータファイル準備
        $fpASPFunc  = fopen($sTmpFilename, "w");
        if(!$fpASPFunc) {

            $sErrMsg = "アプリケーションエラーが発生しました（tmpファイルオープン）。システム管理者に連絡してください。";
            return false;
        }//end if

        $bRtn = fwrite($fpASPFunc, $sReqData);
        if( $bRtn == -1 ) {

            fclose($fpASPFunc);

            //TMPファイル削除
            //unlink($sTmpFilename);

            $sErrMsg = "アプリケーションエラーが発生しました（tmpファイル書きｺ��み）。システム管理者に連絡してください。";
            return false;
        }//end if

        if( !fclose($fpASPFunc) ) {

            //TMPファイル削除
            //unlink($sTmpFilename);

            $sErrMsg = "アプリケーションエラーが発生しました（tmpファイルクローズ）。システム管理者に連絡してください。";
            return false;
        }//end if

//UPDATE ABE 050523 START
        //ASP_FunctionCAll 呼び出し
        //$fpPipe = popen("$ASP_FUNC < $sTmpFilename", "r");
        //if( !$fpPipe ) {

            //TMPファイル削除
            //unlink($sTmpFilename);

        //    $sErrMsg = "アプリケーションエラーが発生しました（ASP_FUNCTION_CALL呼び出し）。システム管理者に連絡してください。";
        //    return false;
        //}//end if
//UPDATE ABE 050523 END

        // update by Y.Abe 2006/05/23 pid対応 Start
        //$sRetFilename = CM_TMP_DIR . "/return" . date("YmdHis") . '.txt';
        $sRetFilename = CM_TMP_DIR . "/return" . date("YmdHis") . posix_getpid() . '.txt';
        // update by Y.Abe 2006/05/23 pid対応 End

        $asp_cmd = system("$ASP_FUNC < $sTmpFilename > $sRetFilename");
        $fpPipe = fopen("$sRetFilename", "r");

        if( !$fpPipe ) {
            //TMPファイル削除
            //unlink($sTmpFilename);
            $sErrMsg = "アプリケーションエラーが発生しました（ASP_FUNCTION_CALL呼び出し）。システム管理者に連絡してください。";
            return false;
        }//end if


        //ASP_FunctionCAll 結果取得
        while( !feof($fpPipe) ) {

          $WK = chop(fgets($fpPipe));
          list($a, $b) = explode("=", $WK);
          $aKeyword[$a] = $b;
        }

        $bRtn = pclose($fpPipe);

        //TMPファイル削除
        //if( !unlink($sTmpFilename) ) {

        //    $sErrMsg = "アプリケーションエラーが発生しました（TMPファイル削除）。システム管理者に連絡してください。";
        //    return false;
        //}//end if

        return true;
    }

    //***************************************************************
    // 関数名 ： cmGetErrorInfo
    // 機　能 ： メッセージ取得
    // IN     ： $sErrMsg          メッセージ
    // OUT    ： XML文字列
    // Create ： 2005/01/19 李宏光 V0.0
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
    // 関数名 ： cmSendMail
    // 機　能 ： メール送付する
    //
    // 引　数 ：$sMailSbt    (in)    :  処理種別
    //          $sMailTo             : 送信者
    //          $sMailSubject(in)    : 件名
    //          $sMailText (in)      :  メッセージ内容
    //
    // 戻り値 ： true   :  ＯＫ
    //          false  : ＮＧ
    // 作成者 ： 2005/03/01 李宏光
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
        /*Insert by 張暁娜 2005/04/19 Start*/
        $sMyURL = $oResultEmail["REQ_URL"];
        $dMyIndex = strpos($sMyURL,"?");
        $sMystr2 = substr($sMyURL,$dMyIndex+1);

        /*Update by 張暁娜 2005/04/19 Start*/
        //if (strpos($sMystr2,"?") != -1) {
        if (strpos($sMystr2,"?") != "") {
        /*Update by 張暁娜 2005/04/19 End*/
            $sMystr1 = substr($sMyURL,0,$dMyIndex);
            $sMystr3 = strstr($sMystr2,"?");
            $oResultEmail["REQ_URL"] = $sMystr1.$sMystr3;
        }
        /*Insert by 張暁娜 2005/04/19 End*/

        //Insert by 李宏光 2005/05/12 Start
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
                //データベースへの接続
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
                    //データベースへの接続を切断
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
        //Insert by 李宏光 2005/05/12 End
//Insert by 李宏光 2005/05/13 Start
        // add by Y.Abe 2005/11/28 Start
        $sShinseiSbt = "";
        // add by Y.Abe 2005/11/28 End
        if ($sMailSbt != "5.1.3.14") {
            switch($oResultEmail["SHINSEI_SBT"]) {
                case "NEWID":
                    $oResultEmail["SHINSEI_SBT"] = "BIGLOBE_ID新規";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "NEWID";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "SPNEWID":
                    $oResultEmail["SHINSEI_SBT"] = "特殊BIGLOBE_ID新規";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "SPNEWID";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "UPDDEL":
                    $oResultEmail["SHINSEI_SBT"] = "既存ID変更／削除";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "UPDDEL";
                    // add by Y.Abe 2005/11/28 End
                    break;
                case "NEWAUTH":
                    $oResultEmail["SHINSEI_SBT"] = "担当者ID・操作権限新規";
                    // add by Y.Abe 2005/11/28 Start
                    $sShinseiSbt = "NEWAUTH";
                    // add by Y.Abe 2005/11/28 End
                    break;
                default :
                    break;
            }
        }
//Insert by 李宏光 2005/05/13 End

        switch ($sMailSbt) {
            //5.1.3.3   承認依頼メールテンプレート
            case "5.1.3.3":
                $handle = fopen(CM_EMAIL_DIR . "/syoninirai.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by 李宏光 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by 李宏光 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.4   個別操作権限承認依頼メールテンプレート
            case "5.1.3.4":
                $handle = fopen(CM_EMAIL_DIR . "/kobetusyoninirai.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by 李宏光 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by 李宏光 2005/03/21 End
                $sNew = array("index.php");

                // add by Y.Abe 2005/11/11 Start
                //データベースへの接続
                if ( !cmOCILogon( $conn, $sErrMsg ) ) {
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if

                // 承認対象の権限リスト取得用SQL
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

                // SQLの発行
                if ( !cmOCIExecuteSelect( $conn, $sSql, $dRows, $oResults, $sErrMsg ) ) {
                    //データベースへの接続を切断
                    cmOCILogoff( $conn );
                    cmGetErrorInfo($sErrMsg);
                    return;
                } //end if

                // リストを作成
                $sAuthList = "";
                for ( $i = 0; $i < $dRows; $i++ ) {
                    $sAuthList .= "　".$oResults["AUTHORITY_NAME"][$i] . "
";
                }
                // add by Y.Abe 2005/11/11 End

                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.5   否認通知メールテンプレート
            case "5.1.3.5":
                $handle = fopen(CM_EMAIL_DIR . "/hinin.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by 李宏光 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by 李宏光 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by 李宏光 2005/05/16 Start
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
                              //UPDATE by 増子 2005/04/21 START
                              //"$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SYONIN_NAME ",
                              "$", "SHINSEI_SBT", "$", "REQ_NUM", "$", "SYONIN_NAME",
                              //UPDATE by 増子 2005/04/21 END
                              "$", "DENIAL_REASON", "$", "REQ_URL");
                $sNew = array("", $oResultEmail["INTERNAL_ID"], "", $oResultEmail["SHINSEI_EMAIL"],
                              "", $oResultEmail["SYONIN_EMAIL"], "", $oResultEmail["SHINSEI_NAME"],
                              "", $oResultEmail["REQUEST_DATE"], "", $oResultEmail["SHINSEI_SBT"],
                              //UPDATE by 増子 2005/04/21 START
                              //"", $oResultEmail["REQ_NUM"], "", $oResultEmail["SYONIN_NAME "],
                              "", $oResultEmail["REQ_NUM"], "", $oResultEmail["SYONIN_NAME"],
                              //UPDATE by 増子 2005/04/21 END
                              "", $oResultEmail["DENIAL_REASON"], "", $oResultEmail["REQ_URL"]);*/
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.6   代行承認報告メールテンプレート
            case "5.1.3.6":
                $handle = fopen(CM_EMAIL_DIR . "/daikouhoukoku.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by 李宏光 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by 李宏光 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 Start
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.7   取下げ通知メールテンプレート
            case "5.1.3.7":
                $handle = fopen(CM_EMAIL_DIR . "/torisage.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.8   面接通知メールテンプレート
            case "5.1.3.8":
                $handle = fopen(CM_EMAIL_DIR . "/mensetu.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.9   登録完了通知メールテンプレート
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
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.10   登録エラー通知メールテンプレート
            case "5.1.3.10":
                $handle = fopen(CM_EMAIL_DIR . "/error.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.11   会員グループへの処理依頼メールテンプレート
            case "5.1.3.11":
                $handle = fopen(CM_EMAIL_DIR . "/bcs.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
                //Update by 李宏光 2005/03/21 Start
                $sOld = array("fl/idman.swf");
                //Update by 李宏光 2005/03/21 End
                $sNew = array("index.php");
                $oResultEmail["REQ_URL"] = str_replace($sOld, $sNew, $oResultEmail["REQ_URL"]);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.12   チェック結果NG通知メール（無償ID新規）
            case "5.1.3.12":
                $handle = fopen(CM_EMAIL_DIR . "/csv_err.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.13   チェック結果NG通知メール（無償ID新規以外）
            case "5.1.3.13":
                //$handle = fopen(CM_EMAIL_DIR , "/csv_tantou_err.tmpl","r");
                $handle = fopen(CM_EMAIL_DIR . "/csv_tantou_err.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by 李宏光 2005/05/16 Start
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
//Update by 李宏光 2005/05/16 End
                $sEmailText = str_replace($sOld, $sNew, $sString);
                break;
            //5.1.3.14   管理者向けアラームメール
            case "5.1.3.14":
                $handle = fopen(CM_EMAIL_DIR . "/systemerr.tmpl","r");
                $sString = "";
                while(!feof($handle)) {
                    $buffer = fgets($handle);
                    $sString = $sString . $buffer;
                }
                fclose($handle);
//Update by 李宏光 2005/05/16 Start
                $sOld = array('$ERR_MSG');
                $sNew = array($oResultEmail["ERR_MSG"]);
/*                $sOld = array("$", "ERR_MSG");
                $sNew = array("", $oResultEmail["ERR_MSG"]);*/
//Update by 李宏光 2005/05/16 End
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

        //--文本格式
        if ( $sEmailText != "" ){
            $sEmailText = mb_convert_encoding($sEmailText, "JIS",  "EUC_JP");
            $pp = popen("/usr/lib/sendmail -t -f ".SYSTEM_MAIL, "w");
            fwrite($pp, $sEmailText);
            pclose($pp);
        }

        return false;
    }

    //***************************************************************
    // 関数名 ： cmEcho
    // 機　能 ： XML文字列変換出力
    //
    // 引　数 ：$sxml_string  XML文字列        string
    // 戻り値 ：なし
    //
    // 作成者 ： 2005/02/16曹洪瑞
    //***************************************************************
    function cmEcho($sxml_string){
        //XML文字列変換
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
    // 関数名 ： cmReplaceMsg
    // 機　能 ： XML文字列変換出力
    //
    // 引　数 ：$sErrMsg     XML文字列        string
    //          $sStr
    // 戻り値 ：メッセージ
    //
    // 作成者 ： 2005/03/02 李宏光
    //***************************************************************
    function cmReplaceMsg($sErrMsg, $sStr) {
        $sOld = array("△");
        $sNew = array($sStr);
        $sErrMsg = str_replace($sOld, $sNew, $sErrMsg);
        return $sErrMsg;
    }

    //***************************************************************
    // 関数名 ：cmWriteAccessroguDb
    // 機　能 ：アクセスログへ登録
    // 引　数 ：$sDBName             :対象テーブルＩＤ
    //          $sUserId             :登録者、更新者、削除者
    //          $sOraErrMsg          :Oracleのリターンメッセージ
    //          $strUserSql          :SQL構文内容
    // 戻り値 ：なし
    // 作成者 ：2005/03/23  李宏光
    //***************************************************************
    function cmWriteAccessroguDb( $sDBName, $sUserId, $sOraErrMsg, $strUserSql, $conn ) {

        //禁則文字の変換
        $sChgUserSql = mb_ereg_replace("'", "’", $strUserSql);

        if ( strlen( $sChgUserSql ) > 2560 ) {
            $sFinalUserSql = substr($sChgUserSql, 0, 2558);
        } else {
            $sFinalUserSql = $sChgUserSql;
        }//end if

        //Oracleのリターンコードを取得する
        $dRtnCodePos = mb_strpos($sOraErrMsg, "ORA-");

        if ($sOraErrMsg == "") {
            $sOraRntCode = "ORA-00000";
        }
        else {
            $sOraRntCode = mb_substr($sOraErrMsg, $dRtnCodePos, 9);
        }//end if

        //アクセスログへ登録
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

        //ＳＱＬの実行
        cmOCIExecuteUpdate( $conn, $strSql, $sErrMsg,OCI_COMMIT_ON_SUCCESS );

    }

    //***************************************************************
    // 関数名 ： cmDeleteChar
    // 機　能 ： 「!」を文字列に追加
    //
    // 引　数 ：文字列
    // 戻り値 ：文字列
    //
    // 作成者 ： 2005/02/16曹洪瑞
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
    //insert by 曹洪瑞 2005/07/11 start
    //***************************************************************
    // 関数名 ： cmDeleteArrayChar
    // 機　能 ： 「!」を文字列に追加
    //
    // 引　数 ：文字列
    // 戻り値 ：文字列
    //
    // 作成者 ： 2005/07/11曹洪瑞
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
    //insert by 曹洪瑞 2005/07/11 end

    //***************************************************************
    // 関数名 ： cmAddChar
    // 機　能 ： 文字列を変換
    //
    // 引　数 ：文字列
    // 戻り値 ：文字列
    //
    // 作成者 ： 2005/02/16曹洪瑞
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
    // 関数名 ： cmMaintenanceCheck
    // 機　能 ： sgファイルからメンテ時間情報を得る
    // 　　　 　
    // 引　数 ： $mntInfo : メンテナンス時間情報
    // 戻り値 ： なし
    // 作成者 ： 2003/11/13 阿部@TNES
    //*******************************************************************
    function cmMaintenanceCheck( &$mntInfo ) {

        // SGファイルオープン
        $fp = fopen("/home2/bbwtu/html/IDman/cm/sg.dat","r");

        // メンテナンス時間の取得
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
    // 関数名 ： cmCheckMainteTime
    // 機　能 ： 今現在、設定されているメンテナンス時間かチェックする
    // 　　　 　
    // 引　数 ： $Taisyo    : 対象業務名
    //           $mntInfo   : メンテ時間情報
    // 戻り値 ： なし
    // 作成者 ： 2003/11/13 阿部@TNES
    //*******************************************************************
    function cmCheckMainteTime( $Taisyo, &$mntInfo ) {

        $now_time = date("YmdHi");  // 現在の時刻

        $mntInfo["from$Taisyo"] = date("YmdHi", mktime(substr($mntInfo["from$Taisyo"],8,2),substr($mntInfo["from$Taisyo"],10,2),0,substr($mntInfo["from$Taisyo"],4,2),substr($mntInfo["from$Taisyo"],6,2),substr($mntInfo["from$Taisyo"],0,4)));
        $mntInfo["to$Taisyo"]   = date("YmdHi", mktime(substr($mntInfo["to$Taisyo"],8,2),substr($mntInfo["to$Taisyo"],10,2),0,substr($mntInfo["to$Taisyo"],4,2),substr($mntInfo["to$Taisyo"],6,2),substr($mntInfo["to$Taisyo"],0,4)));

        // 現在が業務画面メンテ時間中かのチェック
        if ( $mntInfo["from$Taisyo"] && $mntInfo["to$Taisyo"]) {
            if ( $now_time < $mntInfo["from$Taisyo"] || $now_time > $mntInfo["to$Taisyo"] ) {
                $mntInfo["from$Taisyo"] = NULL;
                $mntInfo["to$Taisyo"]   = NULL;
            }
        }
    }


    //***************************************************************
    // 関数名 ： cmCheckSession
    // 機　能 ： ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報とｾｯｼｮﾝ情報のﾁｪｯｸ
    //
    // 引　数 ： $key (in) :ｾｯｼｮﾝ・ｷｰ
    //                        TYPE_SESS_USR_INF   ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報のﾁｪｯｸのみ
    //                        ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報
    //                          CM_LOGIN_UID        担当者ID
    //                          CM_LOGIN_PWD        担当者ﾊﾟｰｽﾜｰﾄﾞ
    //                          CM_LOGIN_NME        担当者名
    //                          CM_LOGIN_DEP        担当者部署名
    //                          CM_LOGIN_TEL        担当者電話番号
    //                          CM_LOGIN_MAL        担当者ﾒｰﾙｱﾄﾞﾚｽ
    //                        画面ﾃﾞｰﾀ
    //                          CM_SESS_SENDTO      画面間ﾊﾟﾗﾒｰﾀ
    //                          CM_SESS_CONDITION   検索条件
    //                          CM_SESS_ADDITION    付加条件
    //                          CM_SESS_DETAIL      詳細ﾃﾞｰﾀ
    // 戻り値 ： true :正常
    //           false:異常
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmCheckSession( $key = "TYPE_SESS_USR_INF" ) {

        //カレントのセッション名は、指定した値に変更されます。
        session_name( CM_SESS_NAME );

        //ｾｯｼｮﾝﾃﾞｰﾀを初期化する
        session_start();

        //ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報のﾁｪｯｸ
        if ( !isset( $_SESSION[ CM_LOGIN_UID ] ) ) {    //担当者ID
            return false;
        }

        //ｾｯｼｮﾝ情報のﾁｪｯｸ
        if ( $key != "TYPE_SESS_USR_INF" &&
             !isset( $_SESSION[ $key ] ) ) {
            return false;
        }

        return true;

    }

    //***************************************************************
    // 関数名 ： cmSetSession
    // 機　能 ： ｾｯｼｮﾝﾃﾞｰﾀを設定する
    //
    // 引　数 ： $key (in) :ｾｯｼｮﾝ・ｷｰ
    //                        ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報
    //                          CM_LOGIN_UID        担当者ID
    //                          CM_LOGIN_PWD        担当者ﾊﾟｰｽﾜｰﾄﾞ
    //                          CM_LOGIN_NME        担当者名
    //                          CM_LOGIN_DEP        担当者部署名
    //                          CM_LOGIN_TEL        担当者電話番号
    //                          CM_LOGIN_MAL        担当者ﾒｰﾙｱﾄﾞﾚｽ
    //                        画面ﾃﾞｰﾀ
    //                          CM_SESS_SENDTO      画面間ﾊﾟﾗﾒｰﾀ
    //                          CM_SESS_CONDITION   検索条件
    //                          CM_SESS_ADDITION    付加条件
    //                          CM_SESS_DETAIL      詳細ﾃﾞｰﾀ
    //           $value :ｾｯｼｮﾝ値
    // 戻り値 ： なし
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmSetSession( $key, $value ) {

        //カレントのセッション名は、指定した値に変更されます。
        session_name( CM_SESS_NAME );

        //ｾｯｼｮﾝﾃﾞｰﾀを初期化する
        session_start();

        //ｾｯｼｮﾝﾃﾞｰﾀを設定する
        $_SESSION[ $key ] = $value;


    }

    //***************************************************************
    // 関数名 ： cmGetSession
    // 機　能 ： ｾｯｼｮﾝ値を取得する
    //
    // 引　数 ： $key (in) :ｾｯｼｮﾝ・ｷｰ
    //                        ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報
    //                          CM_LOGIN_UID        担当者ID
    //                          CM_LOGIN_PWD        担当者ﾊﾟｰｽﾜｰﾄﾞ
    //                          CM_LOGIN_NME        担当者名
    //                          CM_LOGIN_DEP        担当者部署名
    //                          CM_LOGIN_TEL        担当者電話番号
    //                          CM_LOGIN_MAL        担当者ﾒｰﾙｱﾄﾞﾚｽ
    //                        画面ﾃﾞｰﾀ
    //                          CM_SESS_SENDTO      画面間ﾊﾟﾗﾒｰﾀ
    //                          CM_SESS_CONDITION   検索条件
    //                          CM_SESS_ADDITION    付加条件
    //                          CM_SESS_DETAIL      詳細ﾃﾞｰﾀ
    // 戻り値 ： $keyという名前のｾｯｼｮﾝ値
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmGetSession( $key ) {

        //カレントのセッション名は、指定した値に変更されます。
        session_name( CM_SESS_NAME );

        //ｾｯｼｮﾝﾃﾞｰﾀを初期化する
        session_start();

        //ｾｯｼｮﾝ値を取得する
        if ( isset( $_SESSION[ $key ] ) ) {
            return $_SESSION[ $key ];
        } else {
            return "";
        } //end if

    }

    //***************************************************************
    // 関数名 ： cmUnsetSession
    // 機　能 ： ｾｯｼｮﾝ情報を削除する
    //
    // 引　数 ： $key (in) :ｾｯｼｮﾝ・ｷｰ
    //                        TYPE_SESS_ALL         すべて情報
    //                        TYPE_SESS_INFO        画面間ﾊﾟﾗﾒｰﾀと検索条件と詳細ﾃﾞｰﾀ
    //                        ﾛｸﾞｲﾝ・ﾕｰｻﾞｰ情報
    //                          CM_LOGIN_UID        担当者ID
    //                          CM_LOGIN_PWD        担当者ﾊﾟｰｽﾜｰﾄﾞ
    //                          CM_LOGIN_NME        担当者名
    //                          CM_LOGIN_DEP        担当者部署名
    //                          CM_LOGIN_TEL        担当者電話番号
    //                          CM_LOGIN_MAL        担当者ﾒｰﾙｱﾄﾞﾚｽ
    //                        画面ﾃﾞｰﾀ
    //                          CM_SESS_SENDTO      画面間ﾊﾟﾗﾒｰﾀ
    //                          CM_SESS_CONDITION   検索条件
    //                          CM_SESS_ADDITION    付加条件
    //                          CM_SESS_DETAIL      詳細ﾃﾞｰﾀ
    // 戻り値 ： なし
    // 作成者 ： 2003/10/13 NECSI
    //***************************************************************
    function cmUnsetSession( $key = "TYPE_SESS_ALL" ) {

        //カレントのセッション名は、指定した値に変更されます。
        session_name( CM_SESS_NAME );

        //ｾｯｼｮﾝ・ﾃﾞｰﾀを初期化する
        session_start();

        //すべてｾｯｼｮﾝ情報を削除
        if ( $key == "TYPE_SESS_ALL" ) {

            $_SESSION = array();
            unset( $_COOKIE[ CM_SESS_NAME ] );
            session_destroy();

        //画面間ﾊﾟﾗﾒｰﾀと検索条件と詳細ﾃﾞｰﾀの削除
        } else if ( $key == "TYPE_SESS_INFO" ) {

            //画面間ﾊﾟﾗﾒｰﾀ
            if ( isset( $_SESSION[ CM_SESS_SENDTO ] ) ) {
                unset( $_SESSION[ CM_SESS_SENDTO ] );
            } //end if

            //検索条件
            if ( ( $_SESSION[ CM_SESS_CONDITION ] ) ) {
                unset( $_SESSION[ CM_SESS_CONDITION ] );
            } //end if

            //付加条件
            if ( ( $_SESSION[ CM_SESS_ADDITION ] ) ) {
                unset( $_SESSION[ CM_SESS_ADDITION ] );
            } //end if

            //詳細ﾃﾞｰﾀ
            if ( isset( $_SESSION[ CM_SESS_DETAIL ] ) ) {
                unset( $_SESSION[ CM_SESS_DETAIL ] );
            } //end if

        } else {

            //ｾｯｼｮﾝﾃﾞｰﾀを削除する
            if ( isset( $_SESSION[ $key ] ) ) {
                unset( $_SESSION[ $key ] );
            } //end if

        } //end if

    }

    //***************************************************************
    // 関数名 ： cmAddQuotation
    // 機　能 ： シングルクォーテーションを処理
    //
    // 引　数 ：文字列
    // 戻り値 ：文字列
    //
    // 作成者 ： 2005/06/15曹洪瑞
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
    // 関数名 ： cmCheckHankaku
    // 機　能 ： 半角文字列かをチェックする
    //
    // 引　数 ：文字列
    // 戻り値 ：True/False
    //
    // 作成者 ： 2005/09/07 Y.Abe
    //***************************************************************
    function cmCheckHankaku( $sStr ){

        // バイト数の取得
        $sByte = strlen( $sStr );

        // 文字数の取得
        $sNum  = mb_strlen( $sStr );

        if ( $sByte == $sNum ) {
            // バイト数 = 文字数なら半角文字列
            return true;
        } else {
            // バイト数 != 文字数なら全角混じり
            return false;
        }

    }

    //***************************************************************
    // 関数名 ： cmCheckMailAddress
    // 機　能 ： メールのフォーマットチェックをする
    //
    // 引　数 ：文字列
    // 戻り値 ：True/False
    //
    // 作成者 ： 2005/09/07 Y.Abe
    //***************************************************************
    function cmCheckMailAddress( $sStr ){

// Change TNES 2020/03/03 START
        //if ( ereg( "^.+@.+$", $sStr ) ) {
        if ( preg_match( "/^.+@.+$/",$sStr) ) {
// Change TNES 2020/03/03 END
            // 正常なメールアドレス
            return true;
        } else {
            // 不正なメールアドレス
            return false;
        }

    }

    //***************************************************************
    // 関数名 ： cmFgetcsvReg
    // 機　能 ： ファイルポインタから行を取得し、CSVフィールドを処理する
    //           fgetcsv改良版(マルチバイト対応)
    // 引　数 ：ファイルハンドル
    //          レングス
    //          デリミタ
    //          囲い文字
    // 戻り値 ：True/False
    //          ファイルの終端に達した場合を含み、エラー時にFALSEを返却
    // 作成者 ： 2008/12/09 K.Oikawa
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
