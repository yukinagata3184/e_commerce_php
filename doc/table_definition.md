# テーブル定義書 DB:MySQL author:nagata

|論理テーブル名|商品マスタ|
|:---:|:---:|
|物理テーブル名|m_product|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|商品ID|product_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|商品名|product_name_jpn|VARCHAR|200| | | | | | |〇|
|単価|product_value|INT|-|UNSIGNED| | | | | |〇|
|商品概要|product_abstract|VARCHAR|255| | | | | | | |
|商品説明|product_explain|VARCHAR|1000| | | | | | | |
|画像|product_image|VARCHAR|100| | | | | | | |

|論理テーブル名|会員マスタ|
|:---:|:---:|
|物理テーブル名|m_member|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|会員コード|member_cd|INT|-|UNSIGNED|〇| |〇| | |〇|
|パスワード|member_password|VARCHAR|255| | | | | | |〇|
|氏名|member_name|VARCHAR|100| | | | | | |〇|
|フリガナ|member_ruby|VARCHAR|100| | | | | | |〇|
|メールアドレス|member_email|VARCHAR|100| | | | | |ユニーク|〇|
|電話番号|member_tel|VARCHAR|15| | | | | | |〇|
|郵便番号|member_zip_code|VARCHAR|7| | | | | | |〇|
|都道府県|prefecture_id|TINYINT|-|UNSIGNED| |〇| |m_prefecture| |〇|
|住所(県名除く)|member_address|VARCHAR|200| | | | | | |〇|
|部屋番号|member_room_number|VARCHAR|100| | | | | | | |
|生年月日|member_birth|DATE|-| | | | | | | |
|性別ID|gender_id|TINYINT|-|UNSIGNED| |〇| |m_gender| | |

|論理テーブル名|都道府県マスタ|
|:---:|:---:|
|物理テーブル名|m_prefecture|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|都道府県ID|prefecture_id|TINYINT|-|UNSIGNED|〇| | |m_prefecture| |〇|
|都道府県名|prefecture_name|VARCHAR|10| | | | | | |〇|

|論理テーブル名|性別マスタ|
|:---:|:---:|
|物理テーブル名|m_gender|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|性別ID|gender_id|TINYINT|-|UNSIGNED|〇| | | | |〇|
|性別説明|gender_explain|VARCHAR|10|UNSIGNED| | | | | |〇|

|論理テーブル名|在庫テーブル|
|:---:|:---:|
|物理テーブル名|t_stock|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|商品ID|product_id|INT|-|UNSIGNED|〇|〇| |m_product| |〇|
|在庫数|stock_num|INT|-|UNSIGNED| | | | | |〇|

|論理テーブル名|購入者情報テーブル|
|:---:|:---:|
|物理テーブル名|t_customer_info|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|購入者ID|customer_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|郵便番号|customer_zip_code|VARCHAR|7| | | | | | |〇|
|都道府県|prefecture_id|TINYINT|-|UNSIGNED| |〇| |m_prefecture| |〇|
|住所(県名除く)|customer_address|VARCHAR|200| | | | | | |〇|
|部屋番号|customer_room_number|VARCHAR|100| | | | | | | |
|生年月日|customer_birth|DATE|-| | | | | | | |
|性別ID|gender_id|TINYINT|-|UNSIGNED| |〇| |m_gender| | |
|支払い方法コード|payment_cd|INT|-|UNSIGNED| |〇| |t_payment| |〇|

|論理テーブル名|売上テーブル|
|:---:|:---:|
|物理テーブル名|t_sales|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|売上ID|sales_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|購入者ID|customer_id|INT|-|UNSIGNED| |〇| |t_customer_info| |〇|
|商品ID|product_id|INT|-|UNSIGNED| |〇| |m_product| |〇|
|個数|sales_num|INT|-|UNSIGNED| | | | | |〇|
|購入日|sales_date|DATE|-| | | | | | |〇|

|論理テーブル名|購入履歴テーブル|
|:---:|:---:|
|物理テーブル名|t_buy_history|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|購入履歴ID|buy_history_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|会員コード|member_cd|INT|-|UNSIGNED| |〇| |m_member| |〇|
|売上ID|sales_id|INT|-|UNSIGNED| |〇| |t_sales| |〇|

|論理テーブル名|商品グループマスタ|
|:---:|:---:|
|物理テーブル名|m_group|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|商品グループID|group_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|グループ説明|group_explain|VARCHAR|1000| | | | | | |〇|

|論理テーブル名|商品グループテーブル|
|:---:|:---:|
|物理テーブル名|t_group|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|商品グループコード|group_cd|INT|-|UNSIGNED|〇| |〇| | |〇|
|商品グループID|group_id|INT|-|UNSIGNED| |〇| |m_group| |〇|
|商品ID|product_id|INT|-|UNSIGNED| |〇| |m_product| |〇|

|論理テーブル名|季節マスタ|
|:---:|:---:|
|物理テーブル名|m_season|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|季節ID|season_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|季節説明|season_explain|VARCHAR|1000| | | | | | |〇|

|論理テーブル名|季節テーブル|
|:---:|:---:|
|物理テーブル名|t_season|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|季節コード|season_cd|INT|-|UNSIGNED|〇| |〇| | |〇|
|季節ID|season_id|INT|-|UNSIGNED| |〇|〇|m_season| |〇|
|商品ID|product_id|INT|-|UNSIGNED| |〇| |m_product| |〇|

|論理テーブル名|受注生産テーブル|
|:---:|:---:|
|物理テーブル名|t_bto|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|受注生産ID|bto_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|商品ID|product_id|INT|-|UNSIGNED| |〇| |m_product| |〇|
|お届け日数|bto_delivery_time|VARCHAR|255| | | | | | |〇|

|論理テーブル名|クレジットカードテーブル|
|:---:|:---:|
|物理テーブル名|t_credit_card|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|購入者ID|customer_id|INT|-|UNSIGNED|〇|〇| |t_customer_info| |〇|
|カード番号|credit_card_number|VARCHAR|16| | | | | | |〇|
|有効期限|credit_card_expiration|DATE|-| | | | | | |〇|
|名義人氏名|credit_card_name|VARCHAR|100| | | | | | |〇|
|セキュリティコード|credit_card_cvc|VARCHAR|3| | | | | | |〇|

|論理テーブル名|支払い方法テーブル|
|:---:|:---:|
|物理テーブル名|t_payment|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|支払い方法コード|payment_cd|INT|-|UNSIGNED|〇| | | | |〇|
|支払い方法説明|payment_explain|VARCHAR|50| | | | | | |〇|

|論理テーブル名|お問い合わせテーブル|
|:---:|:---:|
|物理テーブル名|t_contact|

|論理カラム名|物理カラム名|データ型|サイズ|属性|PK|FK|A_I|参照テーブル|その他|NOT NULL|
|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|:---:|
|問い合わせID|contact_id|INT|-|UNSIGNED|〇| |〇| | |〇|
|氏名|contact_name|VARCHAR|100| | | | | | |〇|
|フリガナ|contact_ruby|VARCHAR|100| | | | | | |〇|
|メールアドレス|contact_email|VARCHAR|100| | | | | | |〇|
|電話番号|contact_tel|VARCHAR|15| | | | | | |〇|
|問い合わせ件名|contact_title|VARCHAR|100| | | | | | |〇|
|問い合わせ内容|contact_details|VARCHAR|1000| | | | | | |〇|
|会員コード|member_cd|INT|-|UNSIGNED| | | |m_member| | |
