import useDebouncedRef from '../composables/useDebouncedRef'

const buttonRadius = useDebouncedRef(0.25)

export default function useColors() {
    return {
        buttonRadius
    }
}
