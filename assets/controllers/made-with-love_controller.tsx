import { Controller } from '@hotwired/stimulus';
import * as React from 'react';
import MadeWithLove from '../components/MadeWithLove';
import ReactDOM from "react-dom/client";

/* fetch: lazy */
export default class extends Controller {
    connect() {
        ReactDOM.createRoot(this.element as HTMLElement).render(
            <MadeWithLove />
        );
    }
}
