
import type { InjectionKey } from "vue";

interface Progress {
    percent: number;
}

export const ProgressKey: InjectionKey<Progress> = Symbol("Progress");