<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSIS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-main: #020617;
            --bg-elevated: #020617;
            --bg-card: #020617;
            --bg-soft: #020617;
            --accent: #22c55e;
            --accent-soft: rgba(34, 197, 94, 0.16);
            --accent-strong: #4ade80;
            --accent-alt: #0ea5e9;
            --text-main: #e5e7eb;
            --text-soft: #9ca3af;
            --border-subtle: rgba(148, 163, 184, 0.25);
            --glass: rgba(15, 23, 42, 0.82);
            --radius-lg: 22px;
            --radius-md: 18px;
            --radius-pill: 999px;
            --shadow-soft: 0 24px 60px rgba(0, 0, 0, 0.7);
            --shadow-glow: 0 0 80px rgba(34, 197, 94, 0.45);
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html, body {
            height: 100%;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Space Grotesk', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top left, #0f172a 0, #020617 45%, #000 100%);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        body.page-ready {
            opacity: 1;
            transform: translateY(0);
        }

        /* Reveal-on-scroll helpers */
        .fade-section {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity 0.7s ease-out, transform 0.7s ease-out;
        }

        .fade-section.in-view {
            opacity: 1;
            transform: translateY(0);
        }

        .page-shell {
            min-height: 100vh;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(56, 189, 248, 0.22), transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(34, 197, 94, 0.18), transparent 55%),
                radial-gradient(circle at 0% 80%, rgba(129, 140, 248, 0.16), transparent 55%);
            background-blend-mode: screen;
        }

        .shell-inner {
            max-width: 1320px;
            margin: 0 auto;
            padding: 26px 20px 80px;
        }

        .blur-orb {
            position: fixed;
            inset: auto auto 10% -10%;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.16), transparent 60%);
            filter: blur(40px);
            z-index: -1;
            opacity: 0.8;
        }

        /* Top Nav */
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
            padding: 10px 18px;
            border-radius: var(--radius-pill);
            border: 1px solid rgba(148, 163, 184, 0.3);
            background: radial-gradient(circle at top left, rgba(15, 23, 42, 0.94), rgba(15, 23, 42, 0.94));
            backdrop-filter: blur(22px);
            box-shadow: 0 18px 60px rgba(15, 23, 42, 0.9);
            position: sticky;
            top: 16px;
            z-index: 40;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .logo-mark {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            overflow: hidden;
            display: grid;
            place-items: center;
            background: transparent;
            padding: 0;
        }

        .logo-mark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .logo-text-main {
            font-weight: 600;
            letter-spacing: 0.04em;
            font-size: 18px;
        }

        .logo-dot {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 13px;
            color: var(--text-soft);
        }

        .nav-links a {
            text-decoration: none;
            color: inherit;
            padding: 8px 10px;
            border-radius: 999px;
            border: 1px solid transparent;
            transition: color 0.2s ease, border-color 0.2s ease, background 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--text-main);
            border-color: rgba(148, 163, 184, 0.5);
            background: rgba(15, 23, 42, 0.8);
        }

        .nav-cta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .badge-soft {
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid rgba(34, 197, 94, 0.45);
            background: radial-gradient(circle at top left, rgba(34, 197, 94, 0.17), rgba(15, 23, 42, 0.9));
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-strong);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: radial-gradient(circle, #22c55e, #16a34a);
            box-shadow: 0 0 16px rgba(22, 163, 74, 0.9);
        }

        .btn {
            border-radius: var(--radius-pill);
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid rgba(148, 163, 184, 0.3);
            background: radial-gradient(circle at top left, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.98));
            color: var(--text-main);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease, background 0.15s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 40px rgba(15, 23, 42, 0.9);
            border-color: rgba(148, 163, 184, 0.6);
        }

        .btn-primary {
            border-color: rgba(34, 197, 94, 0.7);
            background: linear-gradient(135deg, #22c55e, #0ea5e9);
            color: #020617;
            box-shadow: var(--shadow-glow);
        }

        .btn-primary.btn-large {
            padding: 14px 28px;
            font-size: 15px;
        }

        .btn-primary:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 0 40px rgba(34, 197, 94, 0.7);
        }

        .btn-ghost {
            background: radial-gradient(circle at top left, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 1));
        }

        .btn-icon-circle {
            width: 22px;
            height: 22px;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.9);
            display: grid;
            place-items: center;
            font-size: 15px;
        }

        /* Hero Layout */
        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr);
            gap: 40px;
            margin-top: 80px;
            align-items: center; /* center text and right container vertically */
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            gap: 24px;
            justify-content: center; /* center content within the left column */
            min-height: 60vh;
        }

        .eyebrow-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .pill-highlight {
            border-radius: 999px;
            padding: 6px 12px 6px 6px;
            border: 1px solid rgba(148, 163, 184, 0.4);
            background: radial-gradient(circle at top left, rgba(34, 197, 94, 0.16), rgba(15, 23, 42, 0.98));
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            color: var(--text-soft);
        }

        .pill-highlight strong {
            color: var(--accent);
        }

        .pill-chip {
            border-radius: 999px;
            padding: 3px 10px;
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(55, 65, 81, 0.9);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.13em;
        }

        .hero-title {
            font-size: clamp(2.4rem, 3.4vw, 3.2rem);
            line-height: 1.08;
            letter-spacing: -0.03em;
        }

        .hero-title span.accent {
            background: linear-gradient(135deg, #22c55e, #0ea5e9);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-sub {
            max-width: 460px;
            font-size: 0.98rem;
            color: var(--text-soft);
        }

        .hero-metrics {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 10px;
        }

        .metric {
            min-width: 120px;
        }

        .metric-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--text-soft);
        }

        .metric-value {
            font-size: 1.4rem;
            font-weight: 600;
        }

        .metric-pill {
            padding: 4px 9px;
            border-radius: 999px;
            font-size: 11px;
            margin-top: 4px;
        }

        .metric-pill.positive {
            background: rgba(22, 163, 74, 0.14);
            color: var(--accent-strong);
        }

        .metric-pill.subtle {
            background: rgba(15, 23, 42, 0.9);
            color: var(--text-soft);
            border: 1px solid rgba(55, 65, 81, 0.9);
        }

        .hero-ctas {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 10px;
        }

        .hero-footnote {
            margin-top: 6px;
            font-size: 11px;
            color: var(--text-soft);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .hero-footnote span {
            color: var(--accent-alt);
        }

        .trust-row {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            align-items: center;
            margin-top: 10px;
        }

        .avatars {
            display: flex;
        }

        .avatar {
            width: 28px;
            height: 28px;
            border-radius: 999px;
            background: linear-gradient(145deg, #0ea5e9, #22c55e);
            border: 2px solid #020617;
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 600;
            color: #020617;
            box-shadow: 0 0 0 1px rgba(15, 23, 42, 0.9);
        }

        .avatar:nth-child(2) { transform: translateX(-10px); background: linear-gradient(145deg, #22c55e, #a855f7); }
        .avatar:nth-child(3) { transform: translateX(-20px); background: linear-gradient(145deg, #a855f7, #f97316); }

        .trust-text {
            font-size: 11px;
            color: var(--text-soft);
        }

        .trust-text strong {
            color: var(--text-main);
        }

        /* Hero Right */
        .hero-right {
            position: relative;
            min-height: 420px; /* give the right container more height */
        }

        .glass-orbit {
            position: absolute;
            inset: 0;
            border-radius: 32px;
            border: 1px solid rgba(148, 163, 184, 0.55);
            background: radial-gradient(circle at 0% 0%, rgba(34, 197, 94, 0.18), transparent 60%),
                        radial-gradient(circle at 100% 0%, rgba(56, 189, 248, 0.15), transparent 55%),
                        radial-gradient(circle at 0% 100%, rgba(129, 140, 248, 0.14), transparent 50%),
                        rgba(15, 23, 42, 0.96);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .glass-grid {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(15, 23, 42, 0.0) 0, rgba(15, 23, 42, 0.7) 55%, rgba(15, 23, 42, 0.95) 100%),
                              linear-gradient(90deg, rgba(148, 163, 184, 0.07) 1px, transparent 1px),
                              linear-gradient(180deg, rgba(148, 163, 184, 0.07) 1px, transparent 1px);
            background-size: auto, 38px 38px, 38px 38px;
            opacity: 0.9;
        }

        .hero-logo-large {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-logo-large img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            filter: none;
        }

        .bot-core {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 28px 26px 24px;
            gap: 18px;
        }

        .bot-orbit-ring {
            width: 190px;
            height: 190px;
            border-radius: 50%;
            border: 1px dashed rgba(148, 163, 184, 0.5);
            display: grid;
            place-items: center;
            position: relative;
        }

        .bot-orbit-ring::before {
            content: '';
            position: absolute;
            inset: 26px;
            border-radius: 50%;
            border: 1px solid rgba(34, 197, 94, 0.7);
            box-shadow: 0 0 40px rgba(34, 197, 94, 0.4);
        }

        .bot-orbit-ring::after {
            content: '';
            position: absolute;
            inset: 56px;
            border-radius: 50%;
            border: 1px solid rgba(56, 189, 248, 0.6);
        }

        .bot-sphere {
            width: 86px;
            height: 86px;
            border-radius: 50%;
            background:
                radial-gradient(circle at 30% 15%, #e5e7eb, #6b7280 50%, #020617 100%);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.9);
            position: relative;
            overflow: hidden;
        }

        .bot-sphere::before {
            content: '';
            position: absolute;
            inset: 10px;
            border-radius: 50%;
            border: 1px solid rgba(34, 197, 94, 0.8);
            box-shadow: inset 0 0 35px rgba(34, 197, 94, 0.5);
        }

        .bot-sphere::after {
            content: '';
            position: absolute;
            inset: 40% 26% 18% 26%;
            border-radius: 999px;
            background: radial-gradient(circle at 50% 0%, #22c55e, #16a34a);
        }

        .spark-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            gap: 10px;
        }

        .spark-card {
            flex: 1;
            border-radius: 16px;
            padding: 10px 11px;
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.45);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .spark-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--text-soft);
        }

        .spark-value {
            font-size: 0.92rem;
            font-weight: 500;
        }

        .spark-tag {
            margin-top: 3px;
            font-size: 10px;
            border-radius: 999px;
            padding: 2px 7px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .spark-tag.green {
            background: rgba(22, 163, 74, 0.14);
            color: var(--accent-strong);
        }

        .spark-tag.neutral {
            background: rgba(15, 23, 42, 0.9);
            color: var(--text-soft);
            border: 1px solid rgba(55, 65, 81, 0.9);
        }

        .spark-tag-dot {
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: radial-gradient(circle, #22c55e, #16a34a);
        }

        .sparkline {
            margin-top: 5px;
            height: 32px;
            width: 100%;
            border-radius: 999px;
            background-image: linear-gradient(120deg, rgba(34, 197, 94, 0.12), transparent 30%, rgba(34, 197, 94, 0.4) 60%, transparent 75%, rgba(14, 165, 233, 0.4) 90%);
            position: relative;
            overflow: hidden;
        }

        .sparkline::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('data:image/svg+xml,%3Csvg width="240" height="48" viewBox="0 0 240 48" xmlns="http://www.w3.org/2000/svg"%3E%3Cpolyline fill="none" stroke="%2322c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="0,34 22,30 40,32 58,18 76,22 92,10 110,16 130,6 148,14 166,8 184,16 204,12 224,18 240,10" /%3E%3C/svg%3E');
            background-size: cover;
            opacity: 0.88;
        }

        .status-strip {
            margin-top: 14px;
            border-radius: 999px;
            padding: 6px 10px;
            background: linear-gradient(90deg, rgba(34, 197, 94, 0.16), rgba(14, 165, 233, 0.08));
            border: 1px solid rgba(34, 197, 94, 0.4);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-size: 11px;
        }

        .status-strip span.label {
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--accent-strong);
        }

        .status-strip span.badge {
            padding: 3px 8px;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(55, 65, 81, 0.9);
            color: var(--text-soft);
        }

        /* Section: Why */
        .section {
            margin-top: 120px; /* push feature cards further down */
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 26px;
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 1.18rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--text-soft);
        }

        .section-title span {
            color: var(--accent);
        }

        .section-subtitle {
            max-width: 440px;
            font-size: 0.9rem;
            color: var(--text-soft);
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .why-card {
            border-radius: var(--radius-md);
            padding: 16px 16px 15px;
            background: radial-gradient(circle at top left, rgba(34, 197, 94, 0.15), rgba(15, 23, 42, 1));
            border: 1px solid rgba(148, 163, 184, 0.45);
            box-shadow: 0 14px 40px rgba(15, 23, 42, 0.9);
        }

        .why-card:nth-child(2) {
            background: radial-gradient(circle at top left, rgba(56, 189, 248, 0.18), rgba(15, 23, 42, 1));
        }

        .why-card:nth-child(3) {
            background: radial-gradient(circle at top left, rgba(129, 140, 248, 0.22), rgba(15, 23, 42, 1));
        }

        .why-icon {
            width: 28px;
            height: 28px;
            border-radius: 10px;
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(148, 163, 184, 0.5);
            display: grid;
            place-items: center;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .why-title {
            font-size: 0.98rem;
            margin-bottom: 5px;
        }

        .why-body {
            font-size: 0.86rem;
            color: var(--text-soft);
        }

        /* Market Table */
        .table-shell {
            margin-top: 26px;
            border-radius: 20px;
            border: 1px solid rgba(148, 163, 184, 0.55);
            background: radial-gradient(circle at top left, rgba(15, 23, 42, 0.96), #020617);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .table-tabs {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px 10px;
            border-bottom: 1px solid rgba(30, 64, 175, 0.6);
            background: radial-gradient(circle at 0% 0%, rgba(34, 197, 94, 0.1), rgba(15, 23, 42, 0.98));
        }

        .tab-group {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 2px;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.9);
        }

        .tab {
            padding: 5px 11px;
            font-size: 11px;
            border-radius: 999px;
            border: 1px solid transparent;
            color: var(--text-soft);
            cursor: pointer;
        }

        .tab.active {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.18), rgba(14, 165, 233, 0.18));
            color: var(--accent-strong);
            border-color: rgba(34, 197, 94, 0.7);
        }

        .table-latency {
            font-size: 11px;
            color: var(--text-soft);
        }

        .table-latency span {
            color: var(--accent-strong);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.86rem;
        }

        thead {
            background: rgba(15, 23, 42, 0.96);
        }

        thead th {
            text-align: left;
            padding: 10px 16px 8px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--text-soft);
            border-bottom: 1px solid rgba(31, 41, 55, 0.9);
        }

        tbody tr {
            border-bottom: 1px solid rgba(31, 41, 55, 0.9);
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody td {
            padding: 8px 16px 9px;
        }

        tbody tr:hover {
            background: rgba(15, 23, 42, 0.96);
        }

        .pair {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pair-circle {
            width: 22px;
            height: 22px;
            border-radius: 999px;
            background: linear-gradient(145deg, #0ea5e9, #22c55e);
            display: grid;
            place-items: center;
            font-size: 11px;
            font-weight: 700;
            color: #020617;
        }

        .pair-symbol {
            font-weight: 500;
        }

        .pair-name {
            font-size: 11px;
            color: var(--text-soft);
        }

        .price {
            font-feature-settings: 'tnum' 1, 'lnum' 1;
        }

        .change-pos {
            color: var(--accent-strong);
        }

        .change-neg {
            color: #fb7185;
        }

        .vol {
            color: var(--text-soft);
        }

        .btn-mini {
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.6);
            background: rgba(15, 23, 42, 0.95);
            color: var(--text-soft);
        }

        .table-foot {
            padding: 7px 16px 9px;
            border-top: 1px solid rgba(31, 41, 55, 0.9);
            font-size: 11px;
            color: var(--text-soft);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Split section: Terminal + FAQ */
        .split-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.95fr);
            gap: 32px;
            margin-top: 60px;
        }

        .terminal-card {
            border-radius: 26px;
            border: 1px solid rgba(148, 163, 184, 0.55);
            background: radial-gradient(circle at 0% 0%, rgba(34, 197, 94, 0.18), rgba(15, 23, 42, 0.98));
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .terminal-head {
            padding: 12px 16px 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: radial-gradient(circle at 0% 0%, rgba(34, 197, 94, 0.16), rgba(15, 23, 42, 0.98));
            border-bottom: 1px solid rgba(31, 41, 55, 0.9);
        }

        .traffic-dots {
            display: flex;
            gap: 6px;
        }

        .traffic-dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: #4b5563;
        }

        .traffic-dot:nth-child(1) { background: #f97316; }
        .traffic-dot:nth-child(2) { background: #22c55e; }
        .traffic-dot:nth-child(3) { background: #e5e7eb; }

        .terminal-title {
            font-size: 11px;
            color: var(--text-soft);
        }

        .terminal-body {
            padding: 14px 16px 16px;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
            font-size: 11px;
            background: radial-gradient(circle at 0 0, rgba(34, 197, 94, 0.1), rgba(15, 23, 42, 1));
        }

        .terminal-line {
            display: flex;
            gap: 6px;
            margin-bottom: 4px;
        }

        .terminal-line span.prompt {
            color: #4ade80;
        }

        .terminal-line span.path {
            color: #60a5fa;
        }

        .terminal-line span.cmd {
            color: #e5e7eb;
        }

        .terminal-highlight {
            color: #a5b4fc;
        }

        .terminal-comment {
            color: #6b7280;
        }

        .terminal-grid {
            margin-top: 10px;
            border-radius: 18px;
            border: 1px solid rgba(55, 65, 81, 0.9);
            background: rgba(15, 23, 42, 0.95);
            padding: 10px 12px 9px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 6px;
        }

        .terminal-chip {
            font-size: 10px;
            border-radius: 999px;
            padding: 3px 8px;
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(55, 65, 81, 0.9);
            color: var(--text-soft);
        }

        .terminal-chip span {
            color: var(--accent-strong);
        }

        .faq-card {
            border-radius: 26px;
            border: 1px solid rgba(148, 163, 184, 0.55);
            background: radial-gradient(circle at 100% 0%, rgba(56, 189, 248, 0.2), rgba(15, 23, 42, 0.98));
            box-shadow: var(--shadow-soft);
            padding: 18px 18px 14px;
        }

        .faq-heading {
            font-size: 0.96rem;
            margin-bottom: 4px;
        }

        .faq-subheading {
            font-size: 0.86rem;
            color: var(--text-soft);
            margin-bottom: 12px;
        }

        .faq-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .faq-item {
            border-radius: 14px;
            border: 1px solid rgba(55, 65, 81, 0.9);
            background: rgba(15, 23, 42, 0.95);
            overflow: hidden;
        }

        .faq-btn {
            width: 100%;
            padding: 9px 10px 9px 12px;
            border: none;
            outline: none;
            background: transparent;
            color: inherit;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            cursor: pointer;
            font-size: 0.86rem;
        }

        .faq-btn span.label {
            flex: 1;
        }

        .faq-btn span.icon {
            width: 18px;
            height: 18px;
            border-radius: 999px;
            border: 1px solid rgba(75, 85, 99, 1);
            display: grid;
            place-items: center;
            font-size: 11px;
            color: var(--text-soft);
        }

        .faq-item.active {
            border-color: rgba(34, 197, 94, 0.8);
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.5);
        }

        .faq-item.active .faq-btn {
            background: radial-gradient(circle at 0 0, rgba(34, 197, 94, 0.16), rgba(15, 23, 42, 0.95));
        }

        .faq-item.active .faq-btn span.icon {
            border-color: rgba(34, 197, 94, 0.7);
            color: var(--accent-strong);
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            border-top: 1px solid rgba(31, 41, 55, 0.9);
            padding: 0 12px;
            font-size: 0.82rem;
            color: var(--text-soft);
            transition: max-height 0.2s ease;
        }

        .faq-item.active .faq-body {
            padding-top: 7px;
            padding-bottom: 10px;
            max-height: 200px;
        }

        /* Footer */
        .footer {
            margin-top: 70px;
            padding-top: 20px;
            border-top: 1px solid rgba(31, 41, 55, 0.9);
            font-size: 0.82rem;
            color: var(--text-soft);
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 18px;
        }

        .footer-links a {
            text-decoration: none;
            color: inherit;
            font-size: 0.82rem;
        }

        .footer-tag {
            padding: 4px 9px;
            border-radius: 999px;
            border: 1px solid rgba(55, 65, 81, 0.9);
            background: rgba(15, 23, 42, 0.95);
            font-size: 0.76rem;
        }

        .footer-tag span {
            color: var(--accent-strong);
        }

        /* Responsive */
        @media (max-width: 960px) {
            .shell-inner {
                padding-inline: 16px;
            }

            .nav {
                padding-inline: 14px;
                gap: 18px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                grid-template-columns: minmax(0, 1fr);
            }

            .hero-right {
                order: -1;
            }

            .split-layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .why-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 720px) {
            .nav {
                padding-inline: 12px;
            }

            .logo-text-main {
                font-size: 16px;
            }

            .hero-title {
                font-size: 2.05rem;
            }

            .why-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .table-shell {
                margin-top: 20px;
            }

            thead {
                display: none;
            }

            table, tbody, tr, td {
                display: block;
                width: 100%;
            }

            tbody tr {
                padding: 10px 12px;
            }

            tbody td {
                padding: 3px 0;
            }

            .table-foot {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .terminal-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .hero-ctas {
                flex-direction: column;
            }

            .status-strip {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <div class="blur-orb" aria-hidden="true"></div>

        <div class="shell-inner">
            <!-- NAVIGATION -->
            <header class="nav">
                <div class="nav-left">
                    <div class="logo-mark">
                        <img src="images/is_logo.png" alt="BSIS Logo">
                    </div>
                    <div class="logo-text-main">BSIS</div>
                </div>

                <nav class="nav-links" aria-label="Primary">
                    <a href="#why">Why NeoTrade</a>
                    <a href="#market">Market feed</a>
                    <a href="#terminal">Execution engine</a>
                    <a href="#faq">FAQ</a>
                </nav>

                <div class="nav-cta">
                    <button class="btn btn-primary" type="button">Sign up</button>
                    <button class="btn btn-ghost" type="button">Log in</button>
                </div>
            </header>

            <!-- HERO -->
            <main class="hero fade-section">
                <section class="hero-left" aria-label="Hero">
                    <div class="eyebrow-row"></div>

                    <h1 class="hero-title">
                        Bachelor of Science in <span class="accent">Information System</span>
                    </h1>

                    <p class="hero-sub">
                        The Bachelor of Science in Information System bridges technology and business by equipping students with the skills to design, manage, and innovate information systems. Our department focuses on data-driven solutions, system integration, and emerging technologies, preparing graduates to thrive in today’s dynamic digital environment.
                    </p>

                    <div class="hero-ctas">
                        <button class="btn btn-primary btn-large" type="button">
                            More info
                        </button>
                    </div>

                    <div class="hero-footnote"></div>
                </section>

                <!-- Hero visual -->
                <aside class="hero-right" aria-label="Bot visual">
                    <div class="glass-orbit">
                        <div class="glass-grid" aria-hidden="true"></div>
                        <div class="hero-logo-large">
                            <img src="images/bsis_logo.png" alt="BSIS Logo">
                        </div>
                    </div>
                </aside>
            </main>

            <!-- WHY SECTION -->
            <section id="why" class="section fade-section" aria-labelledby="why-heading">
                <div class="section-header">
                    <div>
                        <div id="why-heading" class="section-title"></div>
                    </div>
                    <p class="section-subtitle"></p>
                </div>

                <div class="why-grid">
                    <article class="why-card">
                        <div class="why-icon">◇</div>
                        <h3 class="why-title">Fully decentralized, never custodial</h3>
                        <p class="why-body">
                            Funds sit in your own vault contracts. Bots only read signals and post transactions – never withdrawable by anyone but you.
                        </p>
                    </article>

                    <article class="why-card">
                        <div class="why-icon">∞</div>
                        <h3 class="why-title">Two profit modes, one interface</h3>
                        <p class="why-body">
                            Choose between ultra‑active scalping bots for intraday gains or slower, market‑neutral vaults tuned for compounding.
                        </p>
                    </article>

                    <article class="why-card">
                        <div class="why-icon">◎</div>
                        <h3 class="why-title">Transparent, real‑time telemetry</h3>
                        <p class="why-body">
                            Every fill, every fee, and every rebalance is streamed to your dashboard with full on‑chain proofs.
                        </p>
                    </article>
                </div>

                <!-- Market table -->
                <div id="market" class="table-shell" aria-label="Market update table">
                    <div class="table-tabs">
                        <div class="tab-group" role="tablist" aria-label="Market filters">
                            <button class="tab active" type="button" role="tab">Popular</button>
                            <button class="tab" type="button" role="tab">Gainers</button>
                            <button class="tab" type="button" role="tab">Newly listed</button>
                        </div>
                        <div class="table-latency">Engine latency: <span>&lt; 42ms</span> across 7 venues</div>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Pair</th>
                                <th>Last price</th>
                                <th>24h change</th>
                                <th>Volume (24h)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pair">
                                        <div class="pair-circle">B</div>
                                        <div>
                                            <div class="pair-symbol">BTC / USDT</div>
                                            <div class="pair-name">Grid‑arbitrage bot</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="price">$92,384.21</td>
                                <td class="change-pos">+3.87%</td>
                                <td class="vol">$1.84B</td>
                                <td><button class="btn-mini" type="button">View strategy</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pair">
                                        <div class="pair-circle">E</div>
                                        <div>
                                            <div class="pair-symbol">ETH / USDC</div>
                                            <div class="pair-name">Volatility harvest</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="price">$4,812.09</td>
                                <td class="change-pos">+6.12%</td>
                                <td class="vol">$926.4M</td>
                                <td><button class="btn-mini" type="button">View strategy</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pair">
                                        <div class="pair-circle">S</div>
                                        <div>
                                            <div class="pair-symbol">SOL / USDT</div>
                                            <div class="pair-name">Perp basis bot</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="price">$172.44</td>
                                <td class="change-pos">+10.02%</td>
                                <td class="vol">$418.7M</td>
                                <td><button class="btn-mini" type="button">View strategy</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="pair">
                                        <div class="pair-circle">A</div>
                                        <div>
                                            <div class="pair-symbol">ARB / ETH</div>
                                            <div class="pair-name">L2 mean‑reversion</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="price">0.00182</td>
                                <td class="change-neg">−2.13%</td>
                                <td class="vol">$68.3M</td>
                                <td><button class="btn-mini" type="button">View strategy</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-foot">
                        <div>Streaming pseudo‑live data for demo purposes only.</div>
                        <div>Protocols: zkSync • Arbitrum • Solana • Base</div>
                    </div>
                </div>
            </section>

            <!-- TERMINAL + FAQ -->
            <section id="terminal" class="split-layout fade-section" aria-label="Execution and FAQ">
                <article class="terminal-card" aria-label="Execution engine terminal">
                    <div class="terminal-head">
                        <div class="traffic-dots" aria-hidden="true">
                            <div class="traffic-dot"></div>
                            <div class="traffic-dot"></div>
                            <div class="traffic-dot"></div>
                        </div>
                        <div class="terminal-title">bots.neotrade.app — orchestrator</div>
                        <div class="terminal-title">Latency &lt; 40ms</div>
                    </div>
                    <div class="terminal-body">
                        <div class="terminal-line">
                            <span class="prompt">neo@mesh</span>
                            <span class="path">~/bots</span>
                            <span class="cmd">$ deploy --strategy <span class="terminal-highlight">quantum-grid-v3</span> --size 25,000 USDT</span>
                        </div>
                        <div class="terminal-line terminal-comment"># compiling risk profile · backtesting on 4.3 years of data…</div>
                        <div class="terminal-line">
                            <span class="prompt">✔</span>
                            <span class="cmd"> 12 nodes synced · 0 warnings · 0 failed checks</span>
                        </div>
                        <div class="terminal-line">
                            <span class="prompt">⇢</span>
                            <span class="cmd"> routing initial orders across <span class="terminal-highlight">7 liquidity venues</span></span>
                        </div>
                        <div class="terminal-line terminal-comment"># live PnL updating every block · withdraw anytime</div>

                        <div class="terminal-grid" aria-hidden="true">
                            <div class="terminal-chip">Sharpe <span>3.91</span></div>
                            <div class="terminal-chip">Win‑rate <span>62%</span></div>
                            <div class="terminal-chip">Max DD <span>−6.2%</span></div>
                            <div class="terminal-chip">Fees saved <span>34%</span></div>
                            <div class="terminal-chip">Slippage &lt; <span>0.12%</span></div>
                            <div class="terminal-chip">Bots online <span>48</span></div>
                            <div class="terminal-chip">Markets <span>320+</span></div>
                            <div class="terminal-chip">Chains <span>6</span></div>
                        </div>
                    </div>
                </article>

                <article id="faq" class="faq-card" aria-label="Frequently asked questions">
                    <h2 class="faq-heading">Frequently asked questions</h2>
                    <p class="faq-subheading">The key things traders ask us when moving from manual clicking to always‑on automation.</p>

                    <div class="faq-list">
                        <div class="faq-item active">
                            <button class="faq-btn" type="button">
                                <span class="label">How do I connect my wallet and start?</span>
                                <span class="icon">−</span>
                            </button>
                            <div class="faq-body">
                                Connect any EVM wallet, choose a strategy, and sign a single transaction to deposit into your personal vault contract. From there, bots simply orchestrate trades on your behalf — you can pause or withdraw at any time.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-btn" type="button">
                                <span class="label">Are funds safe? Can NeoTrade move my assets?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-body">
                                No. Strategies interact with your funds only through audited smart contracts with role‑based permissions. The contracts can rebalance and hedge, but never withdraw to unknown addresses. You remain the sole owner of your keys and assets.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-btn" type="button">
                                <span class="label">What returns should I realistically expect?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-body">
                                Historical performance has ranged between 2–5% daily depending on market conditions, but future returns are never guaranteed. We show full drawdown curves, stress tests, and risk metrics so you can size positions based on your own tolerance.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-btn" type="button">
                                <span class="label">Can I withdraw or switch strategies anytime?</span>
                                <span class="icon">+</span>
                            </button>
                            <div class="faq-body">
                                Yes. You can exit instantly when liquidity allows, or schedule gradual unwinds to minimize impact. Switching between strategies is as simple as reallocating from one vault to another.
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <!-- FOOTER -->
            <footer class="footer fade-section">
                <div>
                    © <?php echo date('Y'); ?> NeoTradeBots. All rights reserved.
                </div>
                <div class="footer-links">
                    <a href="#">Status</a>
                    <a href="#">Docs</a>
                    <a href="#">Security</a>
                    <a href="#">Terms</a>
                    <a href="#">Privacy</a>
                </div>
                <div class="footer-tag">Prototype UI • <span>demo data only</span></div>
            </footer>
        </div>
    </div>

    <script>
        // Simple FAQ accordion interaction + smooth section reveals
        document.addEventListener('DOMContentLoaded', function () {
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach((item) => {
                const btn = item.querySelector('.faq-btn');
                const icon = item.querySelector('.icon');

                btn.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');

                    faqItems.forEach((other) => {
                        other.classList.remove('active');
                        const otherIcon = other.querySelector('.icon');
                        if (otherIcon) otherIcon.textContent = '+';
                    });

                    if (!isActive) {
                        item.classList.add('active');
                        icon.textContent = '−';
                    } else {
                        item.classList.remove('active');
                        icon.textContent = '+';
                    }
                });
            });

            // Mark page as ready for initial fade
            document.body.classList.add('page-ready');

            // IntersectionObserver for smooth scroll-in sections
            const sections = document.querySelectorAll('.fade-section');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('in-view');
                                observer.unobserve(entry.target);
                            }
                        });
                    },
                    {
                        threshold: 0.18
                    }
                );

                sections.forEach((section) => observer.observe(section));
            } else {
                // Fallback: show all sections if IntersectionObserver is not supported
                sections.forEach((section) => section.classList.add('in-view'));
            }
        });
    </script>
</body>
</html>

