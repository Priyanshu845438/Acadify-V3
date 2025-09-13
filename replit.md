# TechSite - Modern Static Website

## Overview

TechSite is a modern, component-based static website built for Ideovent Technologies. It showcases web development services through a responsive, Bootstrap-powered interface with modular HTML components and a sophisticated design system. The site features dynamic theme switching, smooth animations, and a professional service-oriented layout.

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture
- **Framework**: Vanilla HTML/CSS/JavaScript with Bootstrap 5.3.2
- **Component System**: Modular HTML components loaded dynamically via JavaScript
- **Build Pattern**: Static site with client-side component assembly
- **Styling**: CSS component architecture with global variables and theme support

### Design System
- **Theme Management**: CSS custom properties with light/dark mode switching
- **Color Palette**: Primary (#6366f1) and secondary (#8b5cf6) with gradient combinations
- **Typography**: Inter font family with consistent weight hierarchy
- **Spacing**: Bootstrap utility classes with custom component spacing

### Component Architecture
- **Modular Components**: Separate HTML files for reusable UI elements (navbar, hero, cards, footer)
- **Dynamic Loading**: JavaScript-based component loader that fetches and injects HTML partials
- **Template Customization**: Service cards and feature cards support dynamic content injection
- **State Management**: Local storage for theme persistence

### Development Setup
- **Build Tool**: http-server for local development
- **File Structure**: Organized by component type with separate CSS files per component
- **Asset Management**: CDN-based Bootstrap and icons, local CSS and JavaScript

### User Experience Features
- **Responsive Design**: Mobile-first approach with Bootstrap grid system
- **Theme Toggle**: Light/dark mode with icon switching and local storage persistence
- **Smooth Scrolling**: Anchor-based navigation with offset calculations
- **Interactive Elements**: Hover animations, card transitions, and button effects

## External Dependencies

### CDN Resources
- **Bootstrap CSS**: v5.3.2 for responsive framework and utilities
- **Bootstrap Icons**: v1.11.1 for iconography system
- **Google Fonts**: Inter font family (referenced but not explicitly loaded)

### Development Dependencies
- **http-server**: v14.1.1 for local development server
- **Node.js**: Package management and script execution

### Image Assets
- **Unsplash**: External service for placeholder images (client avatars, testimonials)
- **Local Assets**: Hero background and component images (referenced but files not present)

### Browser APIs
- **Local Storage**: Theme preference persistence
- **Fetch API**: Dynamic component loading
- **Intersection Observer**: Potential scroll animations (referenced in architecture)