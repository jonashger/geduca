package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTicketAcesso is a Querydsl query type for TicketAcesso
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTicketAcesso extends EntityPathBase<TicketAcesso> {

    private static final long serialVersionUID = 221140304L;

    public static final QTicketAcesso ticketAcesso = new QTicketAcesso("ticketAcesso");

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final DateTimePath<java.util.Date> dataCadastro = createDateTime("dataCadastro", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataManutencao = createDateTime("dataManutencao", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath ticket = createString("ticket");

    public QTicketAcesso(String variable) {
        super(TicketAcesso.class, forVariable(variable));
    }

    public QTicketAcesso(Path<? extends TicketAcesso> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTicketAcesso(PathMetadata<?> metadata) {
        super(TicketAcesso.class, metadata);
    }

}

