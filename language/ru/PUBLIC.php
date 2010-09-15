<?php

// Общие
$LNG['index']                        = 'Главная';
$LNG['register']                     = 'Регистрация';
$LNG['forum']                        = 'Форум';
$LNG['send']                         = 'Отправить';
$LNG['menu_index']                   = 'Главная';
$LNG['menu_news']                    = 'Новости';
$LNG['menu_rules']                   = 'Правила';
$LNG['menu_agb']                     = 'Положения';
$LNG['menu_pranger']                 = 'Заблокированные';
$LNG['menu_top100']                  = 'Зал славы';
$LNG['menu_disclamer']               = 'Контакты';
$LNH['music_off']                    = 'Музыка: Выкл.';
$LNH['music_on']                     = 'Музыка: Вкл.';

// index.php
// Восстановление пароля
$LNG['mail_not_exist']               = 'Адрес электронной почты не существует!';
$LNG['mail_title']                   = 'Новый пароль';
$LNG['mail_text']                    = 'Это Ваш новый пароль: ';
$LNG['mail_sended']                  = 'Ваш новый пароль успешно отправлен на Вашу электронную почту!';
$LNG['mail_sended_fail']             = 'На эту электронную почту не может быть отправлено письмо!';
$LNG['server_infos']                 = array(
	"Создайте экономическую и военную инфраструктуру.",
	"Исследуйте новейшие технологии.",
	"Ведите войны против других империй.",
	"Создавайте альянсы и ведите переговоры с другими императорами.",
	"Постройте непобедимый флот или планетарную оборону.",
);

// Стандартное
$LNG['login_error']                  = 'Вы ввели неправильные данные! <br><a href="index.php">На главную</a>';
$LNG['login_error_1']                = 'Неправильный логин или пароль!';
$LNG['login_error_2']                = 'Кто-то вошёл в игру через ваш аккаунт с другого компьютера!';
$LNG['login_error_3']                = 'Ваша сессия завершена!';
$LNG['screenshots']                  = 'Скриншоты';
$LNG['universe']                     = 'Вселенная';
$LNG['chose_a_uni']                  = 'Выбрать...';

// lostpassword.tpl
$LNG['lost_pass_title']              = 'Восстановление пароля';
$LNG['retrieve_pass']                = 'Восстановить утерянный пароль';
$LNG['email']                        = 'Электронная почта';

// index_body.tpl
$LNG['user']                         = 'Логин';
$LNG['pass']                         = 'Пароль';
$LNG['remember_pass']                = 'Запомнить';
$LNG['lostpassword']                 = 'Забыли пароль?';
$LNG['welcome_to']                   = 'Добро пожаловать в';
$LNG['server_description']           = '<strong>%s</strong> - это <strong>стратегический космический симулятор в реальном времени</strong> Сражайтесь с <strong>тысячами игроков</strong> во всём мире <strong>одновременно</strong>, чтобы стать лучшим. Для этого вам понадобится обычный браузер.';
$LNG['server_register']              = 'Зарегистрироваться!';
$LNG['server_message']               = 'Присоединяйтесь и станьте частью невероятного мира';
$LNG['login']                        = 'Логин';
$LNG['disclamer']                    = 'Контакты';
$LNG['login_info']                   = 'Я принимаю <a onclick="ajax(\'?page=rules&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\');" style="cursor:pointer;">Правила</a> и <a onclick="ajax(\'?page=agb&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\');" style="cursor:pointer;">Положения</a>';

// reg.php - Регистрация
$LNG['register_closed']              = 'Регистрация закрыта!';
$LNG['register_at']                  = 'Регистрация в ';
$LNG['reg_mail_message_pass']        = 'Вам осталось активировать аккаунт';
$LNG['reg_mail_reg_done']            = 'Добро пожаловать в %s!';
$LNG['invalid_mail_adress']          = 'Недействительный адрес электронной почты!<br>';
$LNG['empty_user_field']             = 'Поле логина не должно быть пустым!<br>';
$LNG['password_lenght_error']        = 'Пароль должен состоять из неменее 6 символов!<br>';
$LNG['user_field_no_alphanumeric']   = 'Логин может содержать только алфавитно-цифровые символы!<br>';
$LNG['user_field_no_space']          = 'Логин не может содержать пробелы!<br>';
$LNG['planet_field_no_alphanumeric'] = 'Название планеты может содержать только алфавитно-цифровые символы!<br>';
$LNG['planet_field_no_space']        = 'Название планеты не может содержать пробелы!<br>';
$LNG['terms_and_conditions']         = 'Я принимаю <a href="index.php?page=agb">Положения</a> и <a href="index.php?page=rules>Правила</a>!<br>';
$LNG['user_already_exists']          = 'Выбранный логин уже существует!<br>';
$LNG['mail_already_exists']          = 'Введённый адрес электронной почты уже существует!<br>';
$LNG['wrong_captcha']                = 'Неверный защитный код!<br>';
$LNG['different_passwords']          = 'Пароль не совпадает!<br>';
$LNG['different_mails']              = 'Е-мейл не совпадает!<br>';
$LNG['welcome_message_from']         = 'Администрация';
$LNG['welcome_message_sender']       = 'Администрация';
$LNG['welcome_message_subject']      = 'Добро пожаловать';
$LNG['welcome_message_content']      = 'Добро пожаловать в %s!<br>Для начала постройте шахту металла. Для этого пройдите в меню Постройки и нажмите Строить справа от изображения шахты металла. Теперь у Вас есть некоторое время, чтобы узнать больше об игре. Помощь новичкам: на нашем <a href=\"http://board.titanspace.org/" target=\"_blank\">Форуме</a>. Теперь постройка Вашего месторождения должна быть завершена. Так как месторождения ничего не производят без энергии, Вы должны построить солнечную электростанцию, вернитесь в меню Постройки, и выберите строить солнечную электростанцию. Чтобы видеть все виды кораблей, оборонных сооружений, зданий и исследований, которое есть в игре, Вам нужно пройти в меню Технологии. Теперь вы можете начать завоевание вселенной. Удачи!';
$LNG['newpass_smtp_email_error']     = '<br><br>Произошла ошибка при отправке пароля на Вашу электронную почту. Ваш пароль: ';
$LNG['reg_completed']                = 'Спасибо за регистрацию! Вы получите письмо на электронную почту с ссылкой на активацию аккаунта.';
$LNG['planet_already_exists']        = 'Планета уже существует!<br>';

// registry_form.tpl
$LNG['server_message_reg']           = 'Присоединяйтесь и станьте частью невероятного мира';
$LNG['register_at_reg']              = 'Регистрация в ';
$LNG['uni_reg']                      = 'Вселенная';
$LNG['user_reg']                     = 'Логин';
$LNG['pass_reg']                     = 'Пароль';
$LNG['pass2_reg']                    = 'Подтвердить пароль';
$LNG['email_reg']                    = 'Электронная почта';
$LNG['email2_reg']                   = 'Подтвердить электронную почту';
$LNG['planet_reg']                   = 'Название главной планеты';
$LNG['lang_reg']                     = 'Язык';
$LNG['register_now']                 = 'Зарегистрироваться';
$LNG['captcha_reg']                  = 'Секретный вопрос';
$LNG['accept_terms_and_conditions']  = 'Я принимаю <a onclick="ajax(\'?page=rules&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\);" style="cursor:pointer;">Правила</a> и <a onclick="ajax(\'?page=agb&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\);" style="cursor:pointer;">Положения</a>';
$LNG['captcha_reload']               = 'Обновить';
$LNG['captcha_help']                 = 'Помощь';
$LNG['captcha_get_image']            = 'Визуальная CAPTCHA';
$LNG['captcha_reload']               = 'Новая CAPTCHA';
$LNG['captcha_get_audio']            = 'Звуковая CAPTCHA';
$LNG['user_active']                  = 'Аккаунт %s активирован!';

// registry_closed.tpl
$LNG['info']                         = 'Информация';
$LNG['reg_closed']                   = 'Регистрация закрыта';

// Правила
$LNG['rules_overview']               = "Правила";
$LNG['rules']                        = array(

	"Аккаунты" =>

	"Владельцем аккаунта является владелец почтового адреса, указанного в настройках игры.
	Пользоваться аккаунтом может только один игрок, но временно разрешается присматривать за чужим аккаунтом (ситтинг).
	Обмен аккаунтами в одной вселенной должен быть произведен с помощью Оператора.
	Менять аккаунт можно не чаще, чем один раз в месяц.
	После принятия чужого аккаунта, новый владелец обязан сменить почтовый адрес в течении 12 часов.",

	"Мультиаккаунты" =>

	"В одной вселенной разрешено иметь только один аккаунт.
	Настоятельно рекомендуется уведомить Оператора, если по каким-то причинам два или более аккаунта используются в одной сети (например из школы, института или интернет-кафе).
	В течение всего времени, пока игра на аккаунтах ведется из одной сети (через одно соединение), будет невозможно пересечение флотов. Кроме того, запрещены другие пересечения.",

	"Присмотр за Аккаунтом (Ситтинг)" =>

	"Ситтинг означает присмотр игрока за чужим аккаунтом.
	Присмотр за чужим аккаунтом разрешён на период не более 12 часов.
	Период досрочно прерывается, если на аккаунт заходит его владелец.
	Во время присмотра запрещены любые действия с флотом, за исключением увода флота из под атаки с заданием Транспорт или Оставить на другую планету или луну владельца.
	Игрок, присматривающий за аккаунтом может тратить ресурсы только на постройки и исследования (строить оборону и флот запрещено).
	Присматривать за аккаунтом можно при условии, что за ним ещё никто не присматривал в предыдущие 7 дней.",

	"Прокачка (пушинг)" =>

	"Прокачка запрещена. Нижестоящему в рейтинге игроку запрещено передавать ресурсы игроку, стоящему выше в рейтинге.
	Это также относится к скрытым схемам передачи ресурсов, например через разбитие флота игрока нижестоящего в рейтинге, и последующим сбором поля обломков, игроком стоящим выше него.
	Торговля между игроками должна быть завершена в 24 часовой срок.
	Во всех остальных случаях (дележ САБ, помощь в сборе поля обломков, и т. д.) игроки должны уведомить Оператора.",

	"Башинг" =>

	"Запрещено атаковать одну планету или луну более 6 раз за период 24 часа
	Это распространяется только на активных игроков.
	Задание Уничтожить приравнивается к Атаке.
	Атаки шпионскими зондами и Межпланетными ракетами не учитываются.
	Во время ведения войны между двумя Альянсами ограничение на количество атак снимается (при условии что война была объявлена по всем правилам на форуме).",

	"Использование багов и скриптов" =>

	"Использование ошибок игры для получения прибыли, а также сокрытие ошибок от администрации строго запрещено.
	Запрещено использование сторонних программ-клиентов.
	Использование автоматических скриптов (ботов) для получения преимущества над другими игроками также запрещено.",

	"Язык общения" =>

	"Во всех вселенных официальным языком считается русский. Сообщения/страницы альянса, написанные на иностранных языках будут удаляться и могут привести к блокировке аккаунта.",

	"Угрозы и оскорбления" =>

	"Запрещены угрозы, касающиеся расправы в реале над другим игроком, членом команды, представителем администрации или другой персоной, причастной к игре.",

	"Спам и порнография" =>

	"Спам, реклама, эротические и порнографические материалы в любой форме запрещены. Нарушение влечёт за собой бессрочную блокировку аакаунта с РО с последующим его удалением.",

	"Нарушения правил" =>

	"Любое нарушение правил может привести к предупреждению, временной или даже постоянной блокировке игрового аккаунта.
	Оператор соответствующей Вселенной определяет тип и длительность наказания и является контактным лицом по вопросам блокировки.",

	"Правила" =>

	"Правила могут меняться. Каждый игрок обязан постоянно узнавать обновленную информацию.",

);

$LNG['rules_info1']                  = "Правила размещены на <a href=\"%s\" target=\"_blank\">Форуме</a> и на главной странице.";
$LNG['rules_info2']                  = "Данные правила являются частью <a onclick=\"ajax('?page=agb&getajax=1');\" style=\"cursor:pointer;\">Положений</a>, которые также должны соблюдаться!</font>";


// Общие положения

$LNG['agb_overview']                 = "Положения";
$LNG['agb']                          = array(

	"Предмет условий использования" => array(

		"Следующие условия определяют использование онлайн-игры 2Moons предоставленной Demiurgi Group на своих веб-страницах.
		Регистрируясь или входя на страницу онлайн-игры 2Moons, пользователи попадают на это пользовательское соглашение с Demiurgi Group.",

		"Эти условия использования полностью замещают более старые версии условий использования 2Moons.",

		"Demiurgi Group предлагает онлайн-игру 2Moons в рамках своих технических и операционных возможностей со средней годовой доступностью 95,0%.
		Это не включает периоды времени, когда использование онлайн-игры 2Moons прерывается или ограничивается из-за непреодолимых технических причин или из-за необходимой работы по обслуживанию без предоставления компенсации со стороны Demiurgi Group в соответствии с условиями данного соглашения.",

		"2Moons постоянно подвергается дальнейшей разработке, обновлениям и адаптации.
		Таким образом, пользователь имеет возможность участвовать в онлайн-игре 2Moons только в текущей версии.",

		"Онлайн-игра 2Moons, предлагаемая Demiurgi Group, предназначена исключительно для развлечения, она не может использоваться для финансовой прибыли или в коммерческих целях.",

		"Пользователь сам/сама отвечает за совместимость и исправность программного и аппаратного обеспечения.",

		"Кроме этих условий использования, применимы существующие правила онлайн-игры 2Moons.
		В случае несоответствия между этими условиями и правилами игры, условия данного соглашения имеют приоритет.",

		"Условия или правила пользователя, которые отличаются от этих условий и положений применимы, только если Demiurgi Group соглашается с их правомочностью в виде предварительного письменного согласия.",
	),

	"Закрытие" => array(

		"Регистрация пользователя является необходимым условием использования онлайн-игры 2Moons, предоставленных Demiurgi Group.",

		"Регистрация разрешается только физическим лицам.
		Только частные лица принимаются как авторизованные пользователи (не группы, не семьи, не супруги и т. д.).
		Если пользователь является несовершеннолетним, он/она подтверждает, что, отправляя запрос на регистрацию, согласие юридических представителей получено.",

		"При регистрации пользователь должен предоставить имя игрока и зарегистрированный электронный адрес.
		Пользователь не имеет права получать специальное имя игрока.
		Имя игрока не может нарушать права третьих сторон и не должно оскорблять публичные правила приличия.
		Кроме того, электронный адрес или адрес сайта не может быть именем пользователя.
		Пользователь должен гарантировать, что информация, предоставленная Demiurgi Group при регистрации, является правдивой и полной.",

		"Регистрация должна производиться лично, регистрация третьей стороной, включая, но не ограничиваясь третьей стороной не разрешена.",

		"Принятие регистрационного заявления на сайте онлайн игры 2Moons имеет место посредством подтверждения регистрации по электронной почте.
		По этому электронному адресу пользователь получает ссылку активации.
		По ссылке активации Demiurgi Group активирует учетную запись пользователя/игрока.
		При авторизации или другой активации компанией Demiurgi Group неопределенное лицензионное соглашение между Demiurgi Group и пользователем этого условия считается заключенным.",

		"При успешной регистрации пользователи могут создавать и независимо управлять учетной записью.",

		"Без явного согласия Demiurgi Group учетная запись пользователя не может передаваться.",

		"Не существует права на регистрацию и активацию.
		Пользователь может зарегистрироваться только один раз в одной вселенной.
		После того, как пользователь зарегистрировался во вселенной, пользователь не может регистрироваться (например, указывая другую или измененную личную информацию) в той же вселенной.",
	),

	"Обязательства пользователя" => array(

        "Пользователь согласен предоставить Demiurgi Group информацию обо всех будущих изменениях его/ее регистрационных данных, включая, но не ограничиваясь изменением электронного адреса.
		Пользователь обязан подтвердить Demiurgi Group при запросе о точности его/ее данных.",

		"Вход, идентификация, пароли
		<br><br>
		3.2.1. Пользователь обязан хранить данные о входе и идентификации и паролях строго конфиденциально.
		Пользователь может вводить данные о входе только на Интернет-страницах, управляемых Demiurgi Group.
        <br><br>
        3.2.2. Термины «данные о входе», «идентификация» и «пароли» включают в себя все последовательности букв и/или символов и/или цифр, используемые для аутентификации пользователя и исключения использования посторонней третьей стороной.
        Пароль должен отличаться от имени игрока.
        <br><br>
        3.2.3. Пользователь обязан защищать все данные о входе, идентификацию и пароли от несанкционированного доступа со стороны третьих сторон.
        <br><br>
        3.2.4. В случае если у пользователя есть основания считать, что третьи стороны получили данную информацию или могут получить, он/она должен немедленно проинформировать Demiurgi Group и изменить свои данные или попросить об этом Demiurgi Group.
        В этом случае или в случае, если у Demiurgi Group есть основания подозревать неправильное использование данных, Demiurgi Group имеет право временно заблокировать доступ пользователя.
        Пользователь получит доступ к использованию снова, как только подозрения на неправильное использование данных будут устранены.
        <br><br>
        3.2.5. Пользователь, ни при каких условиях, не имеет права использовать данные о входе другого пользователя, если правила игры не предоставляют специальных исключений.",

		"Использование Интернет-страниц и содержимого Интернет-страниц Demiurgi Group
		<br><br>
		3.3.1. Если это не разрешено данными условиями использования, пользователь не имеет права редактировать, распространять, публично воспроизводить, использовать для рекламы или использовать не в соответствии с указанными в контракте целями Интернет-страницы Demiurgi Group, или содержимое, или любую их часть.
		Разрешается только техническое воспроизведение с целью навигации, а также постоянного воспроизведения исключительно для частного использования.
        <br><br>
        3.3.2. Термин «содержимое» включает в себя все данные, изображения, текст, графику, музыку, звуки, звуковые последовательности, видео, программы и коды, а также другую информацию, предоставленную компанией Demiurgi Group на своих Интернет-страницах.
        <br><br>
        3.3.3. Пользователь обязан воздерживаться от любых мер, которые могут подвергать риску или прерывать должное функционирование Интернет-сайта, и онлайн-игры 2Moons, а также от доступа к данным, на которые у пользователя нет прав.
        Просмотр содержимого допустимо только таким образом, чтобы это не влияло на использование сайта Demiurgi Group и содержимого другими пользователями.
        Передача данных или программ, которая может повлиять на программное и аппаратное обеспечение получателей, не разрешена.
        <br><br>
        3.3.4.Любое использование сайта Demiurgi Group в коммерческих целях, включая, но не ограничиваясь рекламными, требует предварительного письменного согласия Demiurgi Group.
        <br><br>
        3.3.5.Пользователю не разрешается публиковать содержимое на Интернет-страницах Demiurgi Group.
        <br><br>
        3.3.6.Использование сайта Demiurgi Group через серверы анонимности, которые скрывают истинный IP-адрес пользователя, не разрешено.",

		"Разрешено ставить ссылки на сайты Demiurgi Group до той степени, чтобы они служили только перекрестными ссылками.
		Demiurgi Group сохраняет за собой право отменить это разрешение.
		Тем не менее, не разрешается вставлять или представлять сайт Demiurgi Group или его содержимое посредством гиперссылки в частичном окне (фрейме).",
	),

	"Особые условия использования онлайн-игры" => array(

		"Пользователь может участвовать онлайн-игре 2Moons, используя только одну учетную запись в одной вселенной, если в правилах нет исключений.
		Использование нескольких пользователей не разрешено.
		Такие многопользовательские учетные записи могут быть удалены или заблокированы в любое время на усмотрение Demiurgi Group.",

		"Пользователю не разрешается в какой-либо форме вмешиваться в онлайн-игру с целью манипуляции.
		В частности, пользователь не имеет права применять меры, механизмы или программное обеспечение, которые могут помешать функционированию процесса игры.
		Пользователь не может принимать меры, которые могут привести к беспричинной или чрезмерной нагрузке на технические возможности.
		Пользователю не разрешается блокировать, переписывать или изменять содержимое, созданное авторами игры, или вмешиваться в игру другим способом.",

		"Пользователю также запрещается запускать онлайн-игру (включая все отдельные веб-страницы) с другими программами, кроме браузера.
		В частности, это относится к так называемым ботам или другим инструментам, которые могут заменить или сопровождать веб-интерфейс.
		Также запрещены скрипты и полностью или частично автоматизированные программы, которые дают пользователю преимущество над другими пользователями.
		Это включает в себя функции автообновления и другие встроенные механизмы браузера, если в нем есть автоматизированные операции.",

		"Пользователь не может ни при каких условиях:
		<br><br>
	    а) создавать или использовать мошеннические методы, взломы и программные продукты третьих сторон, которые могут изменить результаты онлайн-игры 2Moons,
        <br><br>
	    б) использовать программное обеспечение, которое обеспечивает «добычу данных» или иным образом препятствует сбору информации, относящейся к онлайн-игре 2Moons,
        <br><br>
	    в) использовать вне онлайн-игры, покупать за настоящие деньги или продавать или менять виртуальные объекты, которые используются в онлайн-игре 2Moons.",

		"Использование мер, сокращающих рекламу, запрещено.
		Не имеет значения, была ли реклама умышленно подавлена или просто заблокирована, например, блокировщиками всплывающих окон и тому подобным.",

	    "Вход разрешен только на главную страницу онлайн-игры 2Moons.
	    Автоматическое открытие учетной записи пользователя, не зависимо от отображения главной страницы, запрещено.",
	),

	"Особые условия использования средств общения (в частности, форумов, чатов, комментариев) на сайтах Demiurgi Group" => array(

		"При помощи различных средств общения (включая, но не ограничиваясь, дискуссионными форумами, чатами, блогами, гостевыми книгами и так далее, а также в функциями комментариев) пользователь может публиковать собственное содержимое на веб-страницах Demiurgi Group.
		В этом отношении, Demiurgi Group исключительно предоставляет технические средства для обмена информацией.",

		"Пользователь принимает на себя ответственность за свое содержимое и обязуется полностью оградить Demiurgi Group от любых исков и разбирательств третьих сторон.
		Demiurgi Group не несет ответственность за содержимое, введенное пользователями.
		Тем не менее, пользователь предоставляет Demiurgi Group постоянное, необратимое неисключительное право использовать содержимое, оставленное им.
		Demiurgi Group отмечает, что у Demiurgi Group нет активной системы отслеживания отправленного содержимого.
		Но вместо этого выполняются выборочные проверки.
		Кроме того, каждый пользователь имеет возможность сообщить Demiurgi Group о подозрении на противозаконное содержимое.
		Demiurgi Group отреагирует максимально быстро и отредактирует или удалит указанное содержимое, если необходимо.",

		"Пользователю не разрешается публиковать или распространять содержимое Интернет-страниц Demiurgi Group, включая, но не ограничиваясь средствами общения, сообщениями, которые:
        <br><br>
	    а) нарушают закон, являются личными или аморальными;
        <br><br>
	    б) нарушают авторские права или другие права третьих сторон;
        <br><br>
	    в) являются непристойными, расистскими, жестокими, порнографическими, или теми, которые являются опасными для детей или имеют пагубную природу;
        <br><br>
	    г) являются оскорбительными, назойливыми или дискредитирующими;
        <br><br>
	    д) содержат «письма счастья» или схемы финансовых пирамид;
        <br><br>
	    е) можно принять за сообщения от Demiurgi Group;
        <br><br>
	    ж) содержат личные данные третьих сторон без их согласия;
        <br><br>
	    з) являются коммерческими, в частности, рекламными.",

		"Использование сайтов, названий компаний или продуктов разрешается, только если это делается не в рекламных целях.",

		"Все пользователи средств общения, предоставленных на Интернет-страницах Demiurgi Group, должны правильно подбирать слова.
		Избегайте оскорбительной критики или нападок на людей в унизительном тоне.",

		"Несмотря на любые другие права, указанные в этих условиях использования, Demiurgi Group имеет право изменять и полностью или частично удалять содержимое, которое нарушает эти правила. Demiurgi Group также имеет право отстранять пользователей, которые нарушают эти правила, навсегда или временно, от дальнейшего использования онлайн-игры, Интернет-страниц Demiurgi Group.",
	),

	"Последствия нарушений обязательств" => array(

		"Demiurgi Group не несет ответственность за повреждения, произошедшие в результате нарушений обязательств пользователем.",

		"Несмотря на любые другие законные или контрактные права, Demiurgi Group по своему усмотрению может предпринять следующие меры, если есть доказательства того, что пользователь нарушает предписания закона, права третьих сторон, эти условия использования или другие соответствующие условия и правила игры:
        <br><br>
        а) изменить или удалить содержимое,
        <br><br>
	    б) предупредить пользователя,
        <br><br>
	    в) опубликовать замечание в онлайн-игре с указанием имени пользователя,
        <br><br>
	    г) временно или навсегда заблокировать доступ пользователя в онлайн-игру, на форум и к содержимому сайта Demiurgi Group,
        <br><br>
	    д) исключить пользователя,
        <br><br>
	    е) наложить временный или постоянный виртуальный запрет в случае нарушения раздела 6,
        <br><br>
	    ж) немедленно аннулировать контракт.",

		"Если пользователь был заблокирован или исключен, он не может зарегистрироваться опять без согласия Demiurgi Group.
		Нет права отказа от исключения, виртуального запрета или другой меры.",
	),

	"Стоимость использования" => array(

		"Если не указано обратное, использование онлайн-игры 2Moons является бесплатным.",

		"Но пользователь может приобрести отдельную услугу и отдельную функцию, предложенную в контексте онлайн-игры.
		Пользователь отдельно информируется о видах функций для покупки, включая, но не ограничиваясь тем, какие особенности имеет каждая функция, возможно, о длительности наличия функции в продаже, стоимости и способах оплаты в контексте онлайн-игры.",

		"Если несовершеннолетнее лицо хочет купить функции, оно должно получить средства для покупки от своего юридического опекуна именно на эти цели или на неограниченные потребности.",

		"Согласованные суммы должны оплачиваться с заключением контракта.
		Дебетовая оплата обычно производится через соответствующего авторизованного поставщика услуг, тогда как снятие можно произвести за несколько дней, чтобы гарантировать длительную пригодность.
		В отдельных случаях общие условия и положения могут применяться авторизованным поставщиком услуг.",

		"Пользователь проверяет полноту и правильность всей информации, предоставленной в контексте платежной транзакции (включая, но не ограничиваясь банком, номер кредитной карты и так далее).",

		"Возможности оплаты варьируются в зависимости от страны участника и доступности на рынке технологически выполнимых возможностей оплаты.
		Demiurgi Group оставляет за собой право изменять возможности оплаты.",

		"Demiurgi Group оставляет за собой право изменять стоимость функций игры (включая виртуальные валюты).
		Это включает в себя право Demiurgi Group понижать или повышать стоимость отдельных функций игры.",

		"В случае неплатежа накапливаются проценты.
		Demiurgi Group также имеет право блокировать учетную запись пользователя, получать компенсацию и прекращать услуги.",
	),

	"Ограничение ответственности" => array(

		"Пользователь непосредственно ответственен перед третьими сторонами за нарушение их прав.
		Пользователь соглашается компенсировать в пользу Demiurgi Group за любой ущерб, который произошел в результате несоблюдения обязательств по этим условиям использования.
		Пользователь освобождает Demiurgi Group от любых претензий, которые другие пользователи или третьи стороны выдвигают в адрес Demiurgi Group за нарушение своих прав из-за содержимого, оставленного пользователем или из-за нарушения других обязательств.
		Пользователь берет на себя все расходы за защиту Demiurgi Group в суде, включая все судебные и адвокатские издержки.
		Это не применяется, если пользователь не несет ответственность за нарушение.",

		"Ответственность Demiurgi Group на любых юридических основаниях, из-за несоблюдения контракта или из-за нарушений обязательств, определяется следующими правилами:
		<br><br>
		8.2.1. Если Demiurgi Group предоставляет соответствующую услугу, ставшую причиной ответственности, бесплатно, Demiurgi Group отвечает только за злой умысел и грубую небрежность.
		<br><br>
		8.2.2. В случае предоставления платных услуг Demiurgi Group отвечает в полной мере за злой умысел и грубую небрежность, а также, в случае травмы, за легкую небрежность, только с нарушением обязательств по контракту, из-за неуплаты Demiurgi Group и невозможности.
		Ответственность за нарушение такого обязательства по контракту ограничивается типичным контрактным ущербом, которого Demiurgi Group должен был ожидать при заключении контракта на основании известных на то время обстоятельств.
		<br><br>
		8.2.3. Demiurgi Group не принимает на себя ответственность за проблемы в сети, произошедшие не по вине Demiurgi Group.
		<br><br>
		8.2.4. За потерю данных Demiurgi Group ответственен в соответствии с предыдущими абзацами, только не в случае, если такую потерю можно было предотвратить, если бы пользователь сделал резервное копирование.
		<br><br>
		8.2.5. Упомянутые ограничения ответственности не применяются в случае гарантий Demiurgi Group, в случае злого умысла и для ущерба из-за гибели людей, потери конечности или здоровья, а также в случае необходимых законных норм.",
	),

	"Длительность контракта; удаление учетной записи пользователя" => array(

		"Если не указано обратное, контракт на использование онлайн-игры 2Moons заключается на неограниченный период.
		Он начинается с момента регистрации или активации Demiurgi Group.",

		"Контракт можно аннулировать одной из сторон в любое время с немедленным эффектом, если нет оговоренного временного периода контракта.
		Если временный период контракта был оговорен, его можно аннулировать только в конце периода.
		Если он не отменен, текущий временный контракт автоматически продлевается на первоначально оговоренный срок контракта.",

		"Каждая сторона имеет право расторгнуть договор по уважительной причине без предварительного уведомления. Уважительные причины:
        <br><br>
	    а) пользователь имеет задолженность по платежам и не платит, несмотря на предупреждения,
        <br><br>
	    б) действия достаточно сильно влияют на игру других игроков,
        <br><br>
	    в) мошеннические методы и/или «взломы», а также различные формы программного обеспечения, инструментов или скриптов используются для изменения процесса игры или игрового механизма онлай-игры,
        <br><br>
	    г) третья сторона играет из учетной записи пользователя, если правила игры не представляют специальных исключений,
        <br><br>
	    д) пользователь играет из учетной записи третьей стороны или использует несколько учетных записей для одной игры,
        <br><br>
	    е) пользователь виртуальных объектов, которые используются в онлайн-игре 2Moons, использует их за пределами игры, пытается продать или купить за «реальные» деньги или пытается поменять,
        <br><br>
	    ж) пользователь нарушает закон, эти условия использования, дополняя существующие условия и/или правила игры.",

		"Любое прекращение должно быть в письменной форме.
		Прекращение по электронной почте считается письменным.",

		"Если есть законные причины (например, длительный период неактивности), Demiurgi Group имеет право отменить учетную запись пользователя.
		Кроме того, Demiurgi Group по своему усмотрению имеет право удалять учетные записи после окончания контракта.",
	),

	"Конфиденциальность" => array(

		"Личные данные пользователя собираются, обрабатываются или используются только с разрешения пользователя, или если этого требует закон.",
	),

	"Изменения данных условий использования, другое, взаимодействие, оговорка об обстоятельствах" => array(

		"Demiurgi Group оставляет за собой право изменять эти условия в любое время без предоставления причин.
		При входе пользователи информируются об измененных условиях онлайн-игры не позднее, чем за две недели до вступления в силу.
		Кроме того, Demiurgi Group может проинформировать пользователя по электронной почте об измененных условиях или отметить, что измененные условия доступны на Интернет-страницах Demiurgi Group.
		Пользователь дает свое согласие на измененные условия, входя в онлайн-игру после вступления в силу измененных условий.
		Demiurgi Group информирует пользователей отдельно в должной форме о важности двухнедельного периода, праве на возражение и последствиях молчания.",

		"Пользователь может передать права и обязательства по данному контракту только после предварительного письменного согласия Demiurgi Group.",

		"Пользователь имеет право только на протест, если его встречный иск юридически установлен или был признан Demiurgi Group и не оспаривается.
		Пользователь может применять только право удержания, если есть претензии, по данному контракту.",

		"Demiurgi Group общается с пользователем – если не указано обратное в данных условиях использования – по электронной почте.
		Пользователь должен регулярно проверять электронный адрес, указанный при регистрации, на предмет сообщений от Demiurgi Group.
		Общаясь с Demiurgi Group, пользователь должен указывать, о какой учетной записи он говорит.",

		"Любые изменения и/или отмена этих условий использования должны быть в письменной форме.
		Это также касается изменения и/или отказа от письменной формы.",

		"Если какое-либо условие данных условий использования становится неэффективным и/или противоречит законным условиям, эффективность оставшихся условий этих условий использования от этого не страдает.
		Неэффективные условия должны быть заменены сторонами такими условиями, которые юридически лучше всего отражают экономический смысл и цель недействительного условия.
		Указанное условие соответственно применяется в случае обхода закона.",
	),
);

// Подключение Facebook

$LNG['fb_perm']                      = 'Вам запрещён доступ. %s необходимы все права, чтобы войти на свой аккаунт в Facebook.\nТакже можно войти не имея аккаунт в Facebook!';

// Новости

$LNG['news_overview']                = "Новости";
$LNG['news_from']                    = "%s из %s";
$LNG['news_does_not_exist']          = "Нет новостей!";

// Контакты

$LNG['disclamer']                    = "Условия использования";
$LNG['disclamer_name']               = "Имя";
$LNG['disclamer_adress']             = "Адрес";
$LNG['disclamer_tel']                = "Телефон";
$LNG['disclamer_email']              = "Электронная почта";

// Translated into Russian by InquisitorEA. All rights reserved (C) 2010

?>