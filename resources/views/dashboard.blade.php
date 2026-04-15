<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EEEP Comendador Miguel Gurgel</title>
    @vite('resources/css/dashboard.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <nav class="topbar">
        <div class="shell topbar-inner">
            <a href="{{ url('/') }}" class="brand" aria-label="Página inicial da EEEP Comendador Miguel Gurgel">
                <div class="brand-mark">
                    <img src="{{ asset('imagens/brasao.png') }}" alt="Brasão da EEEP Comendador Miguel Gurgel">
                </div>
                <div class="brand-copy">
                    <span class="brand-title">EEEP COMENDADOR MIGUEL GURGEL</span>
                    <span class="brand-subtitle">Excelência em educação técnica</span>
                </div>
            </a>

            <div class="topbar-actions">
                <a href="#cursos" class="pill-link">Cursos</a>
                <a href="#localizacao" class="pill-link">Localização</a>
                <a href="{{ route('login') }}" class="admin-button">Admin</a>
            </div>
        </div>
    </nav>

    <main class="page-main">
        <section class="hero">
            <div class="shell hero-shell">
                <div class="editorial-grid">
                    <div class="hero-copy">
                        <span class="eyebrow">Inovação &amp; Técnica</span>
                        <h1>
                            Excelência no Ensino <span>Técnico</span>.
                        </h1>
                        <p>
                            Transformando o potencial de jovens talentos em carreiras de alto impacto através de uma infraestrutura moderna e currículo de vanguarda.
                        </p>

                        <div class="hero-actions">
                            <a href="#cursos" class="button button-secondary">Conhecer Unidade</a>
                        </div>
                    </div>

                    <div class="hero-panel">
                        <div class="hero-panel-card">
                            <span class="hero-panel-label">Destaques</span>
                            <ul>
                                <li>4 cursos técnicos integrados ao ensino médio</li>
                                <li>Rotina escolar em tempo integral</li>
                                <li>Atendimento rápido pelo assistente virtual</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-shapes" aria-hidden="true">
                <div class="shape shape-circle small"></div>
                <div class="shape shape-square"></div>
                <div class="shape shape-ring"></div>
                <div class="shape shape-circle large"></div>
            </div>
        </section>

        <section class="section shell stats-section">
            <div class="stats-grid">
                <article class="stat-card">
                    <strong>4</strong>
                    <span>Cursos técnicos oferecidos</span>
                </article>
                <article class="stat-card">
                    <strong>Integral</strong>
                    <span>Formação voltada para desenvolvimento acadêmico e profissional</span>
                </article>
                <article class="stat-card">
                    <strong>Atendimento</strong>
                    <span>Suporte para alunos, responsáveis e comunidade escolar</span>
                </article>
            </div>
        </section>

        <section id="cursos" class="section shell">
            <div class="section-heading">
                <h2>Nossos Cursos</h2>
                <div class="section-accent"></div>
                <p>Conheça as formações técnicas que unem teoria, prática e preparação para o mercado.</p>
            </div>

            <div class="courses-grid">
                <article class="course-card">
                    <div class="course-icon primary">
                        <span class="material-symbols-outlined">terminal</span>
                    </div>
                    <h3>Desenvolvimento de Sistemas</h3>
                    <p>Criação de softwares, aplicações web e soluções digitais com foco em inovação tecnológica.</p>
                </article>

                <article class="course-card">
                    <div class="course-icon primary">
                        <span class="material-symbols-outlined">lan</span>
                    </div>
                    <h3>Redes de Computadores</h3>
                    <p>Infraestrutura, conectividade, segurança cibernética e administração de ambientes de rede.</p>
                </article>

                <article class="course-card">
                    <div class="course-icon secondary">
                        <span class="material-symbols-outlined">palette</span>
                    </div>
                    <h3>Multimídia</h3>
                    <p>Design visual, produção de conteúdo digital e edição audiovisual com visão criativa e técnica.</p>
                </article>

                <article class="course-card">
                    <div class="course-icon tertiary">
                        <span class="material-symbols-outlined">account_balance_wallet</span>
                    </div>
                    <h3>Contabilidade</h3>
                    <p>Gestão financeira, planejamento, controles internos e apoio a processos administrativos.</p>
                </article>
            </div>
        </section>

        <section id="localizacao" class="location-section">
            <div class="shell">
                <div class="editorial-grid location-grid">
                    <div class="location-copy">
                        <h2>Localização</h2>
                        <p>
                            Nossa unidade está situada em Messejana, Fortaleza, em uma região de fácil acesso e preparada para apoiar o foco acadêmico e o desenvolvimento dos estudantes.
                        </p>

                        <div class="location-items">
                            <div class="location-item">
                                <div class="location-badge">
                                    <span class="material-symbols-outlined">location_on</span>
                                </div>
                                <div>
                                    <strong>Endereço Principal</strong>
                                    <address>R. José Baíma - Messejana, Fortaleza - CE</address>
                                </div>
                            </div>

                            <div class="location-item">
                                <div class="location-badge">
                                    <span class="material-symbols-outlined">schedule</span>
                                </div>
                                <div>
                                    <strong>Horário de Funcionamento</strong>
                                    <span>Segunda a sexta: 07:00 - 17:00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="map-card" aria-label="Representação visual da localização da escola">
                        <div class="map-pattern"></div>
                        <div class="map-pin">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div class="map-label">Messejana, Fortaleza</div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="shell footer-inner">
            <div>
                <span class="footer-title">EEEP Miguel Gurgel</span>
                <p>© 2026 EEEP Comendador Miguel Gurgel. Todos os direitos reservados.</p>
            </div>

            <div class="footer-links">
                <a href="#cursos">Cursos</a>
                <a href="#localizacao">Institucional</a>
                <a href="{{ route('login') }}">Admin</a>
            </div>
        </div>
    </footer>

    <div class="chat-widget" id="chatWidget">
        <button class="chat-fab" id="chatToggle" type="button" aria-expanded="false" aria-controls="chatPanel">
            <span class="material-symbols-outlined">smart_toy</span>
            <span class="chat-fab-tooltip">Posso ajudar?</span>
        </button>

        <section class="chat-panel is-hidden" id="chatPanel" role="dialog" aria-modal="true" aria-labelledby="chatTitle">
            <header class="chat-topbar">
                <div class="chat-topbar-brand">
                    <div class="chat-topbar-logo">
                        <img src="{{ asset('imagens/brasao.png') }}" alt="Brasão da escola">
                    </div>
                    <div>
                        <h2 id="chatTitle">EEEP MIGUEL GURGEL</h2>
                    </div>
                </div>

                <button class="chat-close" id="chatClose" type="button" aria-label="Fechar chat">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </header>

            <div class="chat-header">
                <div class="chat-header-icon">
                    <span class="material-symbols-outlined">smart_toy</span>
                </div>
                <div>
                    <h3>Assistente Miguel</h3>
                    <p><span class="status-dot"></span>Online para ajudar você</p>
                </div>
            </div>

            <div class="chat-body" id="chatMessages" aria-live="polite" aria-label="Mensagens do chat">
                <div class="chat-day-separator">
                    <span>Hoje</span>
                </div>
            </div>

            <div class="chat-input-area">
                <form class="chat-form" id="chatForm" action="{{ url('api/chat/send') }}" method="POST">
                    @csrf
                    <div class="chat-input-wrap">
                        <textarea id="chatInput" name="message" rows="1" placeholder="Escreva sua dúvida aqui..." required aria-label="Digite sua mensagem"></textarea>
                    </div>

                    <button type="submit" class="chat-send-button" disabled aria-label="Enviar mensagem">
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </form>

                <div class="quick-suggestions">
                    <button type="button" class="suggestion-chip">Matrículas</button>
                    <button type="button" class="suggestion-chip">Cursos</button>
                    <button type="button" class="suggestion-chip">Horários</button>
                    <button type="button" class="suggestion-chip">Secretaria</button>
                </div>
            </div>
        </section>
    </div>

    <script>
        const chatWidget = document.getElementById('chatWidget');
        const chatToggle = document.getElementById('chatToggle');
        const heroChatButton = document.getElementById('heroChatButton');
        const chatClose = document.getElementById('chatClose');
        const chatPanel = document.getElementById('chatPanel');
        const chatForm = document.getElementById('chatForm');
        const chatInput = document.getElementById('chatInput');
        const chatMessages = document.getElementById('chatMessages');
        const sendButton = document.querySelector('.chat-send-button');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const suggestionChips = document.querySelectorAll('.suggestion-chip');
        const spamWindowMs = 4000;
        const spamThreshold = 3;
        const cooldownMs = 3000;
        const defaultPlaceholder = 'Escreva sua dúvida aqui...';
        let recentMessageTimes = [];
        let isCooldownActive = false;
        let cooldownTimeoutId = null;

        const padTime = (value) => String(value).padStart(2, '0');
        const currentTime = () => {
            const now = new Date();
            return `${padTime(now.getHours())}:${padTime(now.getMinutes())}`;
        };

        const updateSendAvailability = () => {
            sendButton.disabled = isCooldownActive || !chatInput.value.trim();
            chatInput.disabled = isCooldownActive;
        };

        const startSpamCooldown = () => {
            isCooldownActive = true;
            chatInput.value = '';
            chatInput.placeholder = 'Muitas mensagens seguidas. Aguarde 3 segundos...';
            sendButton.innerHTML = '<span class="material-symbols-outlined">hourglass_top</span>';
            updateSendAvailability();
            autoResize();

            if (cooldownTimeoutId) {
                clearTimeout(cooldownTimeoutId);
            }

            cooldownTimeoutId = window.setTimeout(() => {
                isCooldownActive = false;
                recentMessageTimes = [];
                chatInput.placeholder = defaultPlaceholder;
                sendButton.innerHTML = '<span class="material-symbols-outlined">send</span>';
                updateSendAvailability();
                autoResize();
            }, cooldownMs);
        };

        const shouldBlockSpam = () => {
            const now = Date.now();
            recentMessageTimes = recentMessageTimes.filter((time) => now - time < spamWindowMs);
            recentMessageTimes.push(now);

            if (recentMessageTimes.length >= spamThreshold) {
                recentMessageTimes = [];
                return true;
            }

            return false;
        };

        const autoResize = () => {
            chatInput.style.height = 'auto';
            chatInput.style.height = `${Math.min(chatInput.scrollHeight, 160)}px`;
        };

        const setChatState = (isOpen) => {
            if (isOpen) {
                chatPanel.classList.remove('is-hidden');
                chatPanel.classList.add('is-open');
                chatToggle.setAttribute('aria-expanded', 'true');
                chatInput.focus();
                autoResize();
            } else {
                chatPanel.classList.remove('is-open');
                chatPanel.classList.add('is-hidden');
                chatToggle.setAttribute('aria-expanded', 'false');
            }
        };

        const escapeHtml = (text) => text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

        const formatMessage = (message) => {
            const blocks = escapeHtml(message)
                .split(/\n{2,}/)
                .map((block) => block.trim())
                .filter(Boolean);

            if (!blocks.length) {
                return '<p></p>';
            }

            return blocks.map((block) => `<p>${block.replace(/\n/g, '<br>')}</p>`).join('');
        };

        const createTypingIndicator = () => {
            const wrapper = document.createElement('div');
            wrapper.className = 'chat-row assistant';
            wrapper.id = 'chatTyping';
            wrapper.innerHTML = `
                <div class="chat-avatar assistant-avatar">
                    <span class="material-symbols-outlined">smart_toy</span>
                </div>
                <div class="chat-bubble typing-bubble">
                    <span class="typing-dot"></span>
                    <span class="typing-dot"></span>
                    <span class="typing-dot"></span>
                </div>
            `;

            chatMessages.appendChild(wrapper);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        };

        const removeTypingIndicator = () => {
            const typing = document.getElementById('chatTyping');
            if (typing) {
                typing.remove();
            }
        };

        const addMessage = (role, message) => {
            const row = document.createElement('div');
            row.className = `chat-row ${role}`;

            const avatarIcon = role === 'user' ? 'person' : 'smart_toy';
            const time = currentTime();

            row.innerHTML = `
                <div class="chat-avatar ${role === 'user' ? 'user-avatar' : 'assistant-avatar'}">
                    <span class="material-symbols-outlined">${avatarIcon}</span>
                </div>
                <div class="chat-content ${role === 'user' ? 'align-end' : ''}">
                    <div class="chat-bubble ${role}">
                        ${formatMessage(message)}
                    </div>
                    <span class="chat-time">${time}</span>
                </div>
            `;

            chatMessages.appendChild(row);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        };

        const sendMessage = async (message) => {
            if (isCooldownActive) {
                return;
            }

            if (shouldBlockSpam()) {
                addMessage('assistant', 'Você enviou mensagens muito rápido. Aguarde 3 segundos para continuar.');
                startSpamCooldown();
                return;
            }

            addMessage('user', message);
            chatInput.value = '';
            autoResize();
            sendButton.disabled = true;
            createTypingIndicator();

            try {
                const response = await fetch(chatForm.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ message }),
                });

                const data = await response.json();
                removeTypingIndicator();

                if (!response.ok || data.error) {
                    addMessage('assistant', data.error || 'Ocorreu um erro ao processar a requisição.');
                } else {
                    addMessage('assistant', data.assistant);
                }
            } catch (error) {
                removeTypingIndicator();
                addMessage('assistant', 'Não foi possível conectar ao servidor. Tente novamente.');
            } finally {
                sendButton.innerHTML = '<span class="material-symbols-outlined">send</span>';
                updateSendAvailability();
            }
        };

        chatToggle.addEventListener('click', () => {
            const isOpen = chatToggle.getAttribute('aria-expanded') === 'true';
            setChatState(!isOpen);
        });

        heroChatButton.addEventListener('click', () => setChatState(true));
        chatClose.addEventListener('click', () => setChatState(false));

        chatForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const message = chatInput.value.trim();
            if (!message) {
                return;
            }

            await sendMessage(message);
        });

        chatInput.addEventListener('input', () => {
            updateSendAvailability();
            autoResize();
        });

        chatInput.addEventListener('keydown', async (event) => {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                const message = chatInput.value.trim();
                if (message && !sendButton.disabled) {
                    await sendMessage(message);
                }
            }
        });

        suggestionChips.forEach((chip) => {
            chip.addEventListener('click', async () => {
                if (isCooldownActive) {
                    return;
                }

                setChatState(true);
                chatInput.value = chip.textContent.trim();
                updateSendAvailability();
                autoResize();
                await sendMessage(chatInput.value.trim());
            });
        });

        document.addEventListener('click', (event) => {
            if (!chatWidget.contains(event.target) && chatPanel.classList.contains('is-open')) {
                setChatState(false);
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && chatPanel.classList.contains('is-open')) {
                setChatState(false);
            }
        });

        addMessage('assistant', 'Olá! Sou o Assistente Virtual da EEEP Miguel Gurgel. Como posso ajudar você hoje?');
        chatInput.placeholder = defaultPlaceholder;
        updateSendAvailability();
        autoResize();
    </script>
</body>
</html>
