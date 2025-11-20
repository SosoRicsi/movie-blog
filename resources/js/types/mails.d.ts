export interface MailUser {
    id: number;
    domain_id: number;
    local_part: string;
    domain: {
        id: number;
        name: string;
    };
    user: {
        id: number;
        name: string;
    } | null;
};
