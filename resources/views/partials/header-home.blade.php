<style>
.header-bar {
    width: 100%;
    background: #a36d6d;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    height: 56px;
    margin: 0;
    box-sizing: border-box;
    position: relative;
    z-index: 10;
}
.header-bar .logo {
    color: #fff;
    font-size: 1.2rem;
    font-weight: 600;
    min-width: 90px;
    letter-spacing: 0.5px;
}
.header-bar .right-group {
    display: flex;
    align-items: center;
    gap: 24px;
}
.header-bar nav {
    display: flex;
    align-items: center;
    gap: 16px;
}
.header-bar nav a {
    color: #222;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500;
    transition: color 0.18s;
    padding: 0 2px;
}
.header-bar nav a:hover {
    color: #fff;
}
.header-bar .lang {
    color: #fff;
    background: #a36d6d;
    border-radius: 10px;
    padding: 6px 18px;
    font-weight: 600;
    font-size: 1.07rem;
    margin-left: 8px;
    cursor: pointer;
    border: none;
    transition: background .2s, color .2s;
}
.header-bar .lang:hover {
    background: #fff;
    color: #a36d6d;
}
.header-welcome {
    background: #fff;
    text-align: center;
    margin: 0 auto;
    padding: 36px 0 16px 0;
}
.header-welcome h1 {
    font-size: 2.6rem;
    font-weight: 700;
    color: #222;
    margin: 0;
    letter-spacing: -1.5px;
}
@media (max-width: 900px) {
    .header-bar { flex-direction: column; height: auto; padding: 10px 5vw; }
    .header-bar .right-group { gap: 10px; margin-top: 7px; }
    .header-bar nav { gap: 8px; }
    .header-bar .lang { margin-left: 0; margin-top: 0; }
    .header-welcome { padding: 24px 0 8px 0; }
    .header-welcome h1 { font-size: 1.5rem; }
}
</style>

<div class="header-bar">
    <span class="logo">Logo</span>
    <div class="right-group">
        <nav>
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">S’inscrire</a>
        </nav>
        <button class="lang" onclick="document.getElementById('lang-select').classList.toggle('show')">FR/EN</button>
    </div>
</div>
<div class="header-welcome">
    <h1>Bienvenue sur Hôtel-Gest</h1>
    <div class="mb-2 fs-5 text-secondary">
        Le meilleur de l'hôtel, en quelques clics
    </div>
</div>